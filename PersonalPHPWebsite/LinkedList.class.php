<?php

/**
 * Created by PhpStorm.
 * User: joe_z
 * Date: 2016-05-12
 * Time: 3:50 PM
 */
class LLNode
{
    private $data, $next;

    function __construct($data)
    {
        $this -> data = $data;
        $this -> next = null;
    }

    public function getData() { return $this->data;  }

    public function setData($data) { $this->data = $data; }

    public function getNext() { return $this->next;}

    public function setNext($next) { $this->next = $next; }
}

class LinkedList
{
    private $node;
    private $total;

    function __construct()
    {
        $this->node = null;
        $this->total = 0;
    }

    public function insert($data)
    {
        //PostCondition:: here we create a new node, assign the value of the new node's link to next
        //                ,then assign this list node to the new link and increase the count by one.
        $newNode = new LLNode($data);
        $newNode->setNext(null);
        $this->node = $newNode;

        $this->total++;
    }

    public function delete($data)
    {
        $temp = $this -> node;
        
    }


    public function toString()
    {
        $tempNode = $this -> node;
        while ($tempNode  != null) {
            echo $tempNode->data;
        }
    }

    public function isEmpty()
    {
        return $this -> total === 0;
    }

    public function sizeOf()
    {
        return $this -> total;
    }
}