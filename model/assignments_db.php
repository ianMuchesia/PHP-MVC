<?php

    function get_assignments_by_course($course_id){
       global $db;
       if($course_id){
            $query = 'SELECT A.id , A.description , C.courseName FROM assignments A LEFT JOIN
            courses C ON A.courseID =C.courseID 
            WHERE A.courseID = :course_id ORDER BY A.id';
       }else{
         $query = 'SELECT A.id , A.description , C.courseName FROM assignments A LEFT JOIN
         courses C ON A.courseID =C.courseID 
         ORDER BY C.courseID';
       } 
       $statement = $db -> prepare($query);
       $statement->bindValue(':course_id', $course_id);
       $statement->execute();
       $assignment= $statement->fetchAll();
       $statement->closeCursor();
       return $assignment;


    }


    function delete_assignment($assignment_id){
      global $db;
      $query = 'DELETE FROM assignments WHERE id = :assignment_id';
      $statement = $db -> prepare($query);
      $statement->bindValue(':assignment_id', $assignment_id);
      $statement->execute();
      //we dont need to fetch anything
      //$assignment= $statement->fetchAll();
      $statement->closeCursor();
      


    }



    function add_assignment($course_id, $description){
      global $db;
      $query = 'INSERT INTO assignments (description , courseID) VALUES (:descr,:course_id )';
      $statement = $db -> prepare($query);
      $statement->bindValue(':descr', $description);
      $statement->bindValue(':course_id', $course_id);
      $statement->execute();
      //we dont need to fetch anything
      //$assignment= $statement->fetchAll();
      $statement->closeCursor();
      


    }
