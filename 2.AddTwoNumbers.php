<?php
//Could not solve:
/* You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.



Example 1:
Input: l1 = [2,4,3], l2 = [5,6,4]
Output: [7,0,8]
Explanation: 342 + 465 = 807.
Example 2:

Input: l1 = [0], l2 = [0]
Output: [0]
Example 3:

Input: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
Output: [8,9,9,9,0,0,0,1]
 

Constraints:

The number of nodes in each linked list is in the range [1, 100].
0 <= Node.val <= 9
It is guaranteed that the list represents a number that does not have leading zeros.

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
//  *     }
 * }
 */

 class ListNode {
         public $val = 0;
         public $next = null;
         function __construct($val = 0, $next = null) {
             $this->val = $val;
             $this->next = $next;
            }
    }
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $firstNumber = $this->generateReverseNumberFromLinkedList($l1);
        $secondNumber = $this->generateReverseNumberFromLinkedList($l2);
        $sum = $firstNumber + $secondNumber;
        return $this->generateReverseLinkedListFromNumber($sum);
    }
    function generateReverseNumberFromLinkedList($l1){
        // var_dump($l1 instanceof ListNode);
        $temp = $l1->val; //$temp would be an array.
        // var_dump($temp instanceof ArrayObject);
        // echo gettype($temp);
        // echo "value of temp: ".$temp[1];
        // $tensPower = 0;
        $number = 0;
        for($i = 0; $i < count($temp); $i++){
            // echo "\n".$temp[$i];
            // echo "\n".(pow(10,$i));
            $number = $number + ($temp[$i] * pow(10,$i));
            // $tensPower++;
            // $temp = $temp->next;
        }
        // echo "\n".$number;
        return $number;
    }
    function generateReverseLinkedListFromNumber($number){
        // $last = fmod($number,10);
        // $l1 = new ListNode();
        // $l1->val = $last;
        $temp = $number / 10;
        $count = 1; //count of array.
        while($temp != 0){
            $temp = $temp / 10;
            $count++;
            // $l1->next = fmod($temp,10);
            // $temp = $temp / 10;
        }
        $array = array_fill(0,$count,0);
        // $l1->next = $temp;
        $array[0] = fmod($number,10);
        $temp2 = $number / 10;
        for($i = 1; $i < $count; $i++){
            $array[$i] = fmod($temp2,10);
            $temp2 = $temp2/10;
            // echo $l1->val;
            // $l1->next;
        }
        // echo "array: ".$array;
        return $array;
    }
}

$first = new ListNode([2,4,3]);
// $first = [2,4,3];
$second = [5,6,4];
$one = new Solution();
$number1 = $one->generateReverseNumberFromLinkedList($first);
$number2 = $one->generateReverseNumberFromLinkedList($second);
echo "number is: ".$number;
$one->generateReverseLinkedListFromNumber($number);
?>