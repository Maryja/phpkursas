<?php

class Post
{
    const MAX_LENGTH = 500;

   private $title = "";
   private $content = "";
   private $author = "";

   public function setTitle($title){
        $this->title = $title;
   }
    public function setContent($content){
        $this->content = $content;

        if (strlen($content) > 500):
            echo "Max length is:".self::MAX_LENGTH;
        endif;

    }

    public function  setAuthor($author){
        $this->author = $author;
    }
   public function getTitle(){
        return $this->title;
   }
   public function getContent(){
        return $this->content;

   }

   public function getAuthor(){
        return $this->author;
   }


}

class Person
{
    private $id = "";
    private $name = "";


    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
}

$person = new Person();
$person->setName("John");
$person->setId(10);
$post = new Post();
$post->setTitle("My titile");
$post->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
$post->setAuthor($person);

var_dump($post);