<?php

namespace App\Enums;

enum EventType: string
{
    case Create = 'create';
    case Update = 'update';
    case Delete = 'delete';
    case Restore = 'restore';
    case ForceDelete = 'force-delete';
    case Attach = 'attach';
    case Detach = 'detach';
    case RequestChanges = 'request-changes';
    case RequestReview = 'request-review';
    case MarkAsDraft = 'mark-as-draft';
    case Publish = 'publish';
    case Unpublish = 'unpublish';
    case Approve = 'approve';
    case Reject = 'reject';
    case PurgeCDNCache = 'purge-cdn-cache';

}
