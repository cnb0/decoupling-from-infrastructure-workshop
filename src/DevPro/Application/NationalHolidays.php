<?php
declare(strict_types=1);

namespace DevPro\Application;

use DevPro\Domain\Model\Common\Country;
use DevPro\Domain\Model\Training\ScheduledDate;

interface NationalHolidays
{
    public function isNationalHoliday(Country $country, ScheduledDate $date): bool;
}