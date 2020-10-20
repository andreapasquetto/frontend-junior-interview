<?php


class Picture
{
    /**
     * @var String uri to the thumbnail size picture
     */
    private $thumbnail;

    /**
     * @var String uri to the medium size picture
     */
    private $medium;

    /**
     * @var String uri to the large size picture
     */
    private $large;

    /**
     * Picture constructor.
     * @param $thumbnail
     * @param $medium
     * @param $large
     */
    public function __construct($thumbnail, $medium, $large)
    {
        $this->thumbnail = $thumbnail;
        $this->medium = $medium;
        $this->large = $large;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return mixed
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * @return mixed
     */
    public function getLarge()
    {
        return $this->large;
    }


}

class User
{
    /**
     * @var Picture the user profile image
     */
    private $image;

    /**
     * @var String the user phone number
     */
    private $phone;

    /**
     * @var integer the user age
     */
    private $age;

    /**
     * @var string the user email
     */
    private $email;

    /**
     * @var string the user full name
     */
    private $name;

    /**
     * @var string the user username
     */
    private $username;

    /**
     * @var string the user password
     */
    private $password;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return User
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return String
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return User
     */
    public function setAge(int $age): User
    {
        $this->age = $age;
        return $this;
    }


    /**
     * @param String $phone
     * @return User
     */
    public function setPhone(string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }


    static function load(): User
    {
        $json = json_decode(file_get_contents("https://randomuser.me/api/"));
        $raw = $json->results[0];
        $user = new User();
        return $user
            ->setImage(
                new Picture(
                    $raw->picture->thumbnail,
                    $raw->picture->medium,
                    $raw->picture->large
                )
            )
            ->setPhone($raw->phone)
            ->setAge($raw->dob->age)
            ->setName("{$raw->name->title} {$raw->name->first} {$raw->name->last}")
            ->setUsername($raw->login->username)
            ->setPassword($raw->login->password)
            ->setEmail($raw->email);
    }
}