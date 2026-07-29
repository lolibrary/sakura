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

//    protected static function migrate(\stdClass $value): Activity
//    {
//        $activity = new Activity;
//
//        $activity->log_name = 'nova';
//        $activity->description = 'event from laravel nova';
//        $activity->event = static::name(mb_strtolower($value->name, 'utf-8'))->value;
//
//        // set the "causer" (user for these cases)
//        $activity->causer_type = User::class;
//        $activity->causer_id = $value->user_id;
//
//        // set the "subject" (target)
//        $activity->subject_type = $value->actionable_type;
//        $activity->subject_id = $value->actionable_id;
//
//        $activity->created_at = Carbon::make($value->created_at);
//        $activity->updated_at = Carbon::make($value->updated_at);
//
//        $changes = collect();
//
//        if (is_array($old = json_decode($value->original, associative: true))) {
//            $changes->put('old', $old);
//        }
//
//        if (is_array($new = json_decode($value->changes, associative: true))) {
//            $changes->put('attributes', $new);
//        }
//
//        $activity->attribute_changes = $changes;
//
//        $props = collect([
//            'nova_id' => $value->id,
//        ]);
//
//        foreach (['exception', 'fields', 'status', 'batch_id'] as $prop) {
//            if ($v = $value->{$prop}) {
//                $props->put($prop, $v);
//            }
//        }
//
//        $activity->properties = $props;
//
//        return $activity;
//    }
//
//    protected static function name(string $name): EventType
//    {
//        return match ($name) {
//            "update" => EventType::Update,
//            "create" => EventType::Create,
//            "delete" => EventType::Delete,
//            "attach" => EventType::Attach,
//            "changes requested item",
//            "changes required item",
//            "changes requsted item",
//            "request changes" => EventType::RequestChanges,
//            "mark as ready (pending)",
//            "pending item" => EventType::RequestReview,
//            "publish item" => EventType::Publish,
//            "unpublish item" => EventType::Unpublish,
//            "purge image cache" => EventType::PurgeCDNCache,
//            'draft item' => EventType::MarkAsDraft,
//        };
//    }

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
