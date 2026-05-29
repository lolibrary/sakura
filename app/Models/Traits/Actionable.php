<?php

namespace App\Models\Traits;

/**
 * Local no-op replacement for Nova's Actionable trait.
 *
 * The public site does not rely on action event tracking, so local Docker
 * builds can run without the proprietary Nova package installed.
 */
trait Actionable
{
    //
}
