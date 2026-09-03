<?php

namespace App\Enums\Settings;

enum Section: string
{
    case General = 'general';
    case Tooltip = 'tooltip';
    case HelpText = 'helptext';
}
