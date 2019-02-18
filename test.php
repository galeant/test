<?php 
$class = new test();
// Initial
$ar = [1,2,3,2,5,7,8,9,11,9,22,33,44,55];
$testCase1 = [1,5,3,7,10];
$testCase2 = [-1,-0.35,-3,-0.9,-5];
$testCase3 = [0.5,-0.05,0,-0.5,-5];
$limit = 11;
echo "Nilai ";
print_r($ar);
echo "<br>";
echo 'Limit deret = '.$limit.'<br>';

if($class->length($ar) == 0){
    echo 'Nilai array tidak di set';
}else{
    #== Menentukan nilai terbesar ke 2 ==#
        echo 'Nilai Terbesar ke-2 = '.$class->terbesarKe2($ar).'<br>';
        // echo 'Test Case 1 = '.$class->terbesarKe2($testCase1).'<br>';
        // echo 'Test Case 2 = '.$class->terbesarKe2($testCase2).'<br>';
        // echo 'Test Case 3 = '.$class->terbesarKe2($testCase3).'<br>';
        
    #== Menentukan apakah array memiliki nilai dalam deret ==#
        echo 'Apakah deret ada dalam array? '.$class->deretDalamArray($ar,$limit);
}

class test{
    function terbesarKe2($ar){
        if($this->length($ar) == 0){
            return print_r('Nilai array tidak di set');
        }
        $sort_array = $this->sorting($ar);
        $lengt_array = $this->length($sort_array);
        if($lengt_array == 1){
            return $sort_array[0];
        }
        return $sort_array[$lengt_array-2];        
    }
    function deretDalamArray($ar,$limit){
        $status = false;
        $count = 0;
        $sort_array = $this->sorting($ar);
        $row = [];
        for($i=1;$i<=$limit;$i++){
            $row[] = $i;
        }
        for($j=0;$j<$limit;$j++){
            foreach($row as $r){
                if($sort_array[$j] == $r){
                    $status = true;
                    $count +=1;
                    if($count != $limit){
                        $status = false;
                    }
                }
            }
        }
        if($status == true){
            return 'Benar';
        }else{
            return 'Salah';
        }
    }
    function sorting($ar){
        $length = $this->length($ar);
        for($j=0;$j<$length;$j++){
            for($i = 0;$i<$length-1;$i++){
                if($ar[$i] > $ar[$i+1]){
                    $temp = $ar[$i+1];
                    $ar[$i+1] = $ar[$i];
                    $ar[$i] = $temp;
                }
            }
        }
        return $ar;
    }
    function length($ar){
        $count = 0;
        foreach($ar as $ar){
            $count+=1;
        }
        return $count;
    }
}


