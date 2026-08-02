<?php

namespace App\Console\Commands;

use App\Enums\EventType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Progress;
use Spatie\Activitylog\Models\Activity;

use function Laravel\Prompts\info;

class MigrateActionLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'audit:migrate {--nova}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate audit logs in batches';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // truncate table
        info('Truncating activity_log');
        DB::table('activity_log')->truncate();

        info('Renaming action_events.name');
        $rename = static::renames();
        DB::statement("update action_events set name = $rename");

        info('Mass-importing action_events to activity_log');
        $sql = file_get_contents(database_path('queries/nova-import-audit-log.sql'));
        DB::statement($sql);
    }

    public static function renames(): string
    {
        $query = [];
        $cases = [
            "Mark as ready (pending)" => EventType::RequestReview,
            "Pending Item" => EventType::RequestReview,
            "Attach" => EventType::Attach,
            "Update Attached" => EventType::Attach,
            "Detach" => EventType::Detach,
            "Create" => EventType::Create,
            "Delete" => EventType::Delete,
            "Update" => EventType::Update,
            "Publish Item" => EventType::Publish,
            "Unpublish Item" => EventType::Unpublish,
            "Purge Image Cache" => EventType::PurgeCDNCache,
            "Draft Item" => EventType::MarkAsDraft,
            "Changes Requested Item" => EventType::RequestChanges,
            "Changes Required Item" => EventType::RequestChanges,
            "Changes Requsted Item" => EventType::RequestChanges,
            "Request Changes" => EventType::RequestChanges,
        ];

        foreach ($cases as $name => $type) {
            $query[] = "when name = '$name' then '$type->value'";
        }

        return "case " .  implode("\n", $query) . " else name end";
    }
}
