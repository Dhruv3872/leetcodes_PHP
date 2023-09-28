<?php
//This one works with 3849ms runtime and 18.98MB memory according to leetcode.com.
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $matchFound = false;
        $max = 0;
        $currentCount = 0;
        $nextLongestSubstring = "";
        for($i = 0; $i < strlen($s); $i++){
            if($nextLongestSubstring == ""){
                $nextLongestSubstring = substr($s,$i,1);//$s[$i];
                $firstIndexOfLastLongestSubstring = $i;
                $currentCount = 1;
                $max = 1;
            }
            else{
                for($j = 0; $j < strlen($nextLongestSubstring); $j++){
                    $matchFound = false;
                    if($s[$i] == $nextLongestSubstring[$j]){
                        //a character has repeated itself.
                        //Hence, we need to terminate this loop
                        //once we check if the current count is
                        // bigger than max, and if so, once we update the 
                        //max.
                        $matchFound = true;
                        if($currentCount > $max){
                            $max = $currentCount;
                            echo $max;
                        }
                        //We will have to restart the loop from 
                        //the character that is next to the 
                        //character from where the current
                        //substring began: 
                        //$i = $firstIndexOfLastLongestSubstring;
                        $firstIndexOfLastLongestSubstring = $firstIndexOfLastLongestSubstring+1;
                        $nextLongestSubstring = substr($s,$firstIndexOfLastLongestSubstring,1);
                        echo $nextLongestSubstring;
                        $i = $firstIndexOfLastLongestSubstring;
                        $currentCount = 1;
                        break;
                    }
                }
                if(!$matchFound){
                    $nextLongestSubstring .= substr($s,$i,1);
                    $currentCount++;
                    if($currentCount > $max){
                            $max = $currentCount;
                            echo $max;
                        }
                }
            }
        }
        return $max;
    }
}

$two = new Solution();
echo $two->lengthOfLongestSubstring("abcabcbb"). "\n";
echo $two->lengthOfLongestSubstring("bbbbb"). "\n";
echo $two->lengthOfLongestSubstring("pwwkew"). "\n";
echo $two->lengthOfLongestSubstring(" "). "\n";