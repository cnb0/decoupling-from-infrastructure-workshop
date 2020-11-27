<?php
declare(strict_types=1);

namespace DevPro\Application;

use DevPro\Application\ScheduleTraining\ScheduleTraining;
use DevPro\Application\Users\CreateOrganizer;
use DevPro\Application\Users\CreateUser;
use DevPro\Domain\Model\Training\TrainingId;
use DevPro\Domain\Model\User\UserId;

interface ApplicationInterface
{
    public function createUser(CreateUser $command): UserId;

    public function createOrganizer(CreateOrganizer $command): UserId;

    public function scheduleTraining(ScheduleTraining $command): TrainingId;
}
