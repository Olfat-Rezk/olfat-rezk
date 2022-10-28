<?php
// dynamic table => 3 levels only
// dynamic rows //4
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

use function PHPSTORM_META\type;

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running',
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        // 'phones'=>"0123123",
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        // 'phones'=>"2345",
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        // 'phones'=>"",
    ]
];
//$user1 = $users[1];
//print_r($user1);
////foreach ($users as $key=>$value){
//    print_r($users[0]- );
//
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table Task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <table class='table'>

            <thead>
                <?php foreach($users[0] AS $property=>$value)  {?>
                <th><?=$property?></th>
                <?php }  ?>
            </thead>
            <tbody>
                <?php
                            foreach($users AS $user){?>
                <tr>
                    <?php  foreach($user As $property => $value){?>
                    <td>
                        <?php if(gettype($value) == 'object' || gettype($value) == 'array'){
                                foreach($value AS $keyOrProperty => $out){
                                      if($property == 'gender' && $keyOrProperty == 'gender'){
                                           if($out == 'm'){
                                                  $out = 'male';
                                                }elseif($out == 'f'){
                                                      $out = 'female';
                                                }
                                            }
                                                  echo  $out ;
                                            }
                                    }else{
                                         echo $value ;
                                    }
                                      ?></td>
                    <?php }?>
                </tr>
                <?php   }?>
            </tbody>
        </table>

        </table>
    </div>


</body>

</html>