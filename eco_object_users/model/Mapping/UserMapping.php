<?php
namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;
use model\Trait\TraitDateTime;
use DateTime;
class UserMapping extends AbstractMapping {

use TraitTestString;
use TraitTestInt;
use TraitDateTime;

protected ?int $object_user_id;
protected ?string $object_user_login;
protected ?string $object_user_pass;
protected ?string $object_user_name;
protected ?string $object_user_email;
protected ?int $object_user_permission;

    public function getObjectUserId(): ?int
    {
        return $this->object_user_id;
    }

    public function setObjectUserId(?int $object_user_id): void
    {
        
        $this->object_user_id = $object_user_id;
    }

    public function getObjectUserLogin(): ?string
    {
        return $this->object_user_login;
    }

    public function setObjectUserLogin(?string $object_user_login): void
    {
        $this->object_user_login = $object_user_login;
    }

    public function getObjectUserPass(): ?string
    {
        return $this->object_user_pass;
    }

    public function setObjectUserPass(?string $object_user_pass): void
    {
        $this->object_user_pass = $object_user_pass;
    }

    public function getObjectUserName(): ?string
    {
        return $this->object_user_name;
    }

    public function setObjectUserName(?string $object_user_name): void
    {
        $this->object_user_name = $object_user_name;
    }

    public function getObjectUserEmail(): ?string
    {
        return $this->object_user_email;
    }

    public function setObjectUserEmail(?string $object_user_email): void
    {
        $this->object_user_email = $object_user_email;
    }

    public function getObjectUserPermission(): ?int
    {
        return $this->object_user_permission;
    }

    public function setObjectUserPermission(?int $object_user_permission): void
    {
        $this->object_user_permission = $object_user_permission;
    }

    public function getObjectUserCreated(): DateTime|string|null
    {
        return $this->object_user_created;
    }

    public function setObjectUserCreated(DateTime|string|null $object_user_created): void
    {
        $this->object_user_created = $object_user_created;
    }

protected null|string|DateTime $object_user_created;

} // end class