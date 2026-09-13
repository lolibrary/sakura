<?php

namespace App\Extensions\Sessions;

use Carbon\Carbon;
use DateTimeInterface;
use hisorange\BrowserDetect\Facade as Browser;
use hisorange\BrowserDetect\Result;
use Torann\GeoIP\Location;

class Session
{
    protected(set) string $userAgent;
    protected(set) string $ip;
    protected(set) string $sessionId;
    protected(set) string $userId;
    protected(set) Result $browser;
    protected(set) DateTimeInterface $lastActivity;
    protected(set) Location $location;
    protected(set) bool $current;

    public function __construct(string $sessionId, array $session)
    {
        $this->sessionId = $sessionId;
        $this->userId = $session['user_id'];
        $this->lastActivity = Carbon::parse($session['last_activity']);
        $this->userAgent = $session['user_agent'];
        $this->browser = Browser::parse($session['user_agent']);
        $this->ip = $session['ip_address'];
        $this->location = geoip($session['ip_address']);
        $this->current = session()->id() === "session:{$sessionId}";
    }
}
