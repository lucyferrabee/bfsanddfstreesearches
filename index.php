<?php
class Person
{
    private $name;

    private $mother;
    private $father;

    public function __construct($name, ?Person $mother = null, $father = null)
    {
        $this->name = $name;
        $this->mother = $mother;
        $this->father = $father;
    }


}

$mumsmum = new Person('Shirley');
$mumsdad = new Person('Chris');
$dadsmum = new Person('Jenny');
$dadsdad = new Person('John');
$mum = new Person('Rose', $mumsmum, $mumsdad);
$dad = new Person('Mark', $mumsmum, $mumsdad);
$me = new Person('Mike', $rose, $mark);

var_dump($me); // one object with two objects inside it, both of those objects would have two objects inside it.

// DFS

function DepthSearch(FamilyMember $member, string $needle) {
    if ($member->name == $needle) {
        echo 'Member found: ' . $member->name;
        return $member;
    } else {
        echo 'Not found in ' . $member->name . '<br>';
        if (!empty($member->parent1)){
            echo 'trying parent 1' . '<br>';
            $result = DepthSearch($member->parent1, $needle);
            if ($result) {
                return $result;
            }
        }
        if (!empty($member->parent2)) {
            echo 'trying parent 2' . '<br>';
            $result = DepthSearch($member->parent2, $needle);
            if ($result) {
                return $result;
            }
        }
        return false;
    };

    // BFS

    function BreadthSearch(FamilyMember $node, string $name)
    {
        $queue = [$node];
        while (count($queue) > 0) {
            $cur = array_shift($queue);
            if($cur->name == $name) {
                return "Member found: " . $cur->name;
            } else {
                echo "Checking: " . $cur->name . "<br>";
            }
            if (!empty($cur->parent1)) {
                array_push($queue, $cur->parent1);
            }
            if (!empty($cur->parent2)) {
                array_push($queue, $cur->parent2);
            }
        }
        return $name . ' not found in list.';
    };