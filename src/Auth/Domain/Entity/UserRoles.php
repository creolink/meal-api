<?php

namespace App\Auth\Domain\Entity;

class UserRoles implements \ArrayAccess
{
    public const ROLE_ALL_USERS_EDIT = 'ROLE_ALL_USERS_EDIT';
    public const ROLE_OWNED_USER_EDIT = 'ROLE_OWNED_USER_EDIT';
    public const ROLE_USER = 'ROLE_USER';

    protected array $value;

    public function __construct(array $value = [])
    {
        $value[] = UserRoles::ROLE_USER;

        $this->value = array_unique($value);
    }

    public function value(): array
    {
        $roles = $this->value;
        $roles[] = UserRoles::ROLE_USER;

        return array_unique($roles);
    }

    public function &__get($key)
    {
        return $this->value[$key];
    }

    public function __set($key, $value)
    {
        $this->value[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->value[$key]);
    }

    public function __unset($key)
    {
        unset($this->value[$key]);
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->value[] = $value;
        } else {
            $this->value[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->value[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->value[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->value[$offset]) ? $this->value[$offset] : null;
    }
}
