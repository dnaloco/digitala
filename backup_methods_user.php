
    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    protected function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param string $user the user
     *
     * @return self
     */
    protected function setUser(string $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param string $password the password
     *
     * @return self
     */
    protected function setPassword(string $password)
    {
        $this->password = static::encryptPassword($password, $this->salt);

        return $this;
    }

    /**
     * Gets the value of roles.
     *
     * @return mixed
     */
    public function getRoles(): ArrayCollection
    {
        return $this->roles;
    }

    /**
     * Sets the value of roles.
     *
     * @param mixed $roles the roles
     *
     * @return self
     */
    protected function setRoles(ArrayCollection $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Gets the value of salt.
     *
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * Gets the value of active.
     *
     * @return boolean
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * Sets the value of active.
     *
     * @param boolean $active the active
     *
     * @return self
     */
    protected function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Gets the value of activationKey.
     *
     * @return string
     */
    public function getActivationKey(): string
    {
        return $this->activationKey;
    }

    /**
     * Sets the value of activationKey.
     *
     * @param string $activationKey the activation key
     *
     * @return self
     */
    protected function setActivationKey()
    {
        $this->activationKey = md5($this->user . $this->salt);

        return $this;
    }

    /**
     * Gets the value of notes.
     *
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * Sets the value of notes.
     *
     * @param string $notes the notes
     *
     * @return self
     */
    protected function setNotes(string $notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Gets the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Sets the value of updatedAt.
     *
     * @param \DateTime $updatedAt the updated at
     *
     * @return self
     *
     * @ORM\PrePersist
     */
    protected function setUpdatedAt()
    {
        $this->updatedAt = new \Datetime("now");

        return $this;
    }