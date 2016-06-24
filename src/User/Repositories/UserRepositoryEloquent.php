<?php

namespace Emiolo\User\Repositories;

use User\Models\User;
use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeDatabase\Contracts\CriteriaCollection;

class UserRepositoryEloquent extends AbstractRepository implements UserRepositoryInterface, CriteriaCollection
{

    public function model()
    {
        return User::class;
    }

}
