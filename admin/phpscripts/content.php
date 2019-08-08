<?php

    function updateSplash($video, $img){
        include('connect.php');
        if ($video['name'] != ''){
            if($img['name'] != ''){
                $videoString = "UPDATE tbl_splash SET splash_video='{$video['name']}', splash_img = '{$img['name']}' WHERE splash_id='1'";
                $updateQuery = mysqli_query($link, $videoString);
                mysqli_close($link);
                $path = "../assets/{$video['name']}";
                $path2 = "../img/{$img['name']}";
                move_uploaded_file($video['tmp_name'], $path);
                move_uploaded_file($img['tmp_name'], $path2);
            }else {
                $videoString = "UPDATE tbl_splash SET splash_video='{$video['name']}' WHERE splash_id='1'";
                $updateQuery = mysqli_query($link, $videoString);
                mysqli_close($link);
                $path = "../assets/{$video['name']}";
                move_uploaded_file($video['tmp_name'], $path);
            }
        }else if($img['name'] != ''){
            $videoString = "UPDATE tbl_splash SET splash_img='{$img['name']}' WHERE splash_id='1'";
            $updateQuery = mysqli_query($link, $videoString);
            mysqli_close($link);
            $path2 = "../img/{$img['name']}";
            move_uploaded_file($img['tmp_name'], $path2);
        }
        redirect_to('admin_content.php');
    }

    function updateAbout($bio,$img){
        include('connect.php');
        if ($bio != ''){
            if($img['name'] != ''){
                $bio = mysqli_real_escape_string($link,$bio);
                $aboutString = "UPDATE tbl_about SET about_desc='{$bio}', about_img='{$img['name']}' WHERE about_id='1'";
                $aboutquery = mysqli_query($link,$aboutString);
                $path = "../img/{$img['name']}";
                move_uploaded_file($img['tmp_name'], $path);
            }else{
                $bio = mysqli_real_escape_string($link,$bio);
                $aboutString = "UPDATE tbl_about SET about_desc='{$bio}' WHERE about_id='1'";
                $aboutquery = mysqli_query($link,$aboutString);
            }
        }else if($img['name'] != ''){
            $aboutString = "UPDATE tbl_about SET about_img ='{$img['name']}' WHERE about_id='1'";
            $aboutquery = mysqli_query($link,$aboutString);
            $path = "../img/{$img['name']}";
            move_uploaded_file($img['tmp_name'], $path);
        }
        mysqli_close($link);
    }

    function updateWhy($wage, $housing, $jobs, $education){
        include('connect.php');
        if($wage !=''){
            $wage = mysqli_real_escape_string($link, $wage);
            $whyString1 = "UPDATE tbl_why SET why_desc = '{$wage}' WHERE why_id = '1'";
            $why1query = mysqli_query($link, $whyString1);
        }
        if($housing != ''){
            $housing = mysqli_real_escape_string($link, $housing);
            $whyString2 = "UPDATE tbl_why SET why_desc = '{$housing}' WHERE why_id = '2'";
            $why2query = mysqli_query($link, $whyString2);
        }
        if($jobs != ''){
            $jobs = mysqli_real_escape_string($link, $jobs);
            $whyString3 = "UPDATE tbl_why SET why_desc = '{$jobs}' WHERE why_id = '3'";
            $why3query = mysqli_query($link, $whyString3);
        }
        if($education != ''){
            $education = mysqli_real_escape_string($link, $education);
            $whyString4 = "UPDATE tbl_why SET why_desc = '{$education}' WHERE why_id = '4'";
            $why4query = mysqli_query($link, $whyString4);
        }

        mysqli_close($link);
    }

    function addJob($pic, $title, $desc){
        include('connect.php');
        if ($pic['name'] != ''){
            if($title != ''){
                if($desc != ''){
                    $title = mysqli_real_escape_string($link, $title);
                    $desc = mysqli_real_escape_string($link, $title);
                    $addJobString = "INSERT INTO tbl_hiring VALUES (NULL,'{$title}', '{$pic['name']}', '{$desc}')";
                    echo $addJobString;
                    $addJobQuery = mysqli_query($link, $addJobString);
                    $path = "../img/{$pic['name']}";
                    move_uploaded_file($pic['tmp_name'], $path);
                    mysqli_close($link);
                }else{
                    echo 'please fill out the entire form';
                }
            }else{
                echo 'please fill out the entire form';
            }  
        }else{
            echo 'please fill out the entire form';
        }
    }

    function grabJobs(){
        include('connect.php');
        $grabString = "SELECT * FROM tbl_hiring";
        $grabQuery = mysqli_query($link, $grabString);
        return $grabQuery;
        mysqli_close($link);
    }

    function deleteJob($id){
        include('connect.php');
        $delstring = "DELETE FROM tbl_hiring WHERE job_id = {$id}";
        $delquery = mysqli_query($link, $delstring);
        mysqli_close($link);
        redirect_to('../admin_content.php');
    }

    function updateVideo($video){
        include('connect.php');
        $updateVString = "UPDATE tbl_video SET video_src = '{$video['name']}' WHERE video_id = '1'";
        $vQuery = mysqli_query($link, $updateVString);
        $path = "../assets/{$video['name']}";
        move_uploaded_file($video['tmp_name'], $path);
        mysqli_close($link);
        redirect_to('admin_content.php');
    }

    function updateNews($title, $pic, $post){
        include('connect.php');
        if($title != ''){
            if($pic['name'] != ''){
                if($post != ''){
                    $updateNewsString = "UPDATE tbl_news SET news_title = '{$title}', news_post = '{$post}', news_img = '{$pic['name']}' WHERE news_id = '1'";
                    $newsQuery = mysqli_query($link, $updateNewsString);
                    $path = "../img/{$pic['name']}";
                    move_uploaded_file($pic['tmp_name'], $path);
                }else{
                    $updateNewsString = "UPDATE tbl_news SET news_title = '{$title}, news_img = '{$pic['name']}' WHERE news_id = '1'";
                    $newsQuery = mysqli_query($link, $updateNewsString);
                    $path = "../img/{$pic['name']}";
                    move_uploaded_file($pic['tmp_name'], $path);
                }
            }else if($post != ''){
                $updateNewsString = "UPDATE tbl_news SET news_title = '{$title}, news_post = '{$post} WHERE news_id = '1'";
                $newsQuery = mysqli_query($link, $updateNewsString);
            }else {
                $updateNewsString = "UPDATE tbl_news SET news_title = '{$title}' WHERE news_id = '1'";
                $newsQuery = mysqli_query($link, $updateNewsString);
            }   
        }else if($pic['name'] != ''){
            if($post != ''){
                $updateNewsString = "UPDATE tbl_news SET news_img = '{$pic['name']}', news_post = '{$post}' WHERE news_id = '1'";
                    $newsQuery = mysqli_query($link, $updateNewsString);
                    $path = "../img/{$pic['name']}";
                    move_uploaded_file($pic['tmp_name'], $path);
            }else{
                $updateNewsString = "UPDATE tbl_news SET news_img = '{$pic['name']}' WHERE news_id = '1'";
                    $newsQuery = mysqli_query($link, $updateNewsString);
                    $path = "../img/{$pic['name']}";
                    move_uploaded_file($pic['tmp_name'], $path);
            }
        }else if($post != ''){
            $updateNewsString = "UPDATE tbl_news SET news_post = '{$post}' WHERE news_id = '1'";
            $newsQuery = mysqli_query($link, $updateNewsString);
        }
        mysqli_close($link);
        redirect_to('admin_content.php');

    }

?>