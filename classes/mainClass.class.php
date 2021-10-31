<?php

// a class file with the main classes
class mainClass
{
    //vars
    private $db;

    private $kurskod;
    private $kursnamn;
    private $progression;
    private $kursplan;


    //--------- CONSTRUKTOR -------------------------------------
    public function __construct()
    {
        // connection to the database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE); //Connects to the database
        if ($this->db->connect_errno > 0) { //
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    // Read out all the things from a table------------------

    /** 
     * Get all courses
     * @return array
     */
    public function getAll($db_table): array
    {
        $sql = "SELECT * FROM $db_table";
        $result = $this->db->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get one thing based on its id --------------
    /** 
     * Get one thing by id
     * @param int $id
     * @return array
     */

    // Get one thing
    public function getOne($db_table, int $id): array
    {
        $this->sql = "SELECT * FROM $db_table WHERE id=$id;";

        $id = intval($id);

        $result = $this->db->query($this->sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // delete something ---------------
    /** 
     * Delete 
     * @param int $id
     * @return boolean
     */
    public function deleteOne($db_table, int $id): bool
    {
        $id = intval($id);

        $sql = "DELETE FROM $db_table WHERE id=$id;";
        $result = $this->db->query($sql);

        return $result;
    }
    // Schools---------------------------------------------------------------------


    // Add new school ---------------------
    /** 
     * Add a school
     * @param string $kurskod 
     * @param string $kursnamn 
     * @param string $progression
     * @param string $kursplan
     * @return boolean
     */
    public function addSchool($db_table, string $kurskod, string $kursnamn, string $progression, string $kursplan): bool
    {
        $this->kurskod = $kurskod;
        $this->kursnamn = $kursnamn;
        $this->progression = $progression;
        $this->kursplan = $kursplan;
        // the question marks is for the undecided data that we havent put into the tabel yet
        $stm = $this->db->prepare("INSERT INTO $db_table(school,course,startdate,enddate) VALUES (?, ?, ?, ?)");

        if ($kurskod == "" || $kursnamn == "" || $progression == "" || $kursplan == "") {
            echo '';
        } else {
            //the ssss stands for four strings, what a world
            $stm->bind_param("ssss", $this->kurskod, $this->kursnamn, $this->progression, $this->kursplan);
        }

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
        $stm->close();
    }

        // update a school -------------
    /** 
     * Update course
     * @param int $id
     * @param string $kurskod 
     * @param string $kursnamn 
     * @param string $progression
     * @param string $kursplan
     * @return boolean
     */
    public function updateSchool($db_table, int $id, string $kurskod, string $kursnamn, string $progression, string $kursplan): bool
    {

        $this->kurskod = $kurskod;
        $this->kursnamn = $kursnamn;
        $this->progression = $progression;
        $this->kursplan = $kursplan;
        $id = intval($id);

        $stm = $this->db->prepare("UPDATE $db_table SET school=?, course=? ,startdate=?, enddate=? WHERE id=$id;");

        if ($kurskod == "" || $kursnamn == "" || $progression == "" || $kursplan == "") {
        } else {
            $stm->bind_param("ssss", $this->kurskod, $this->kursnamn, $this->progression, $this->kursplan);
        }
        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
        $stm->close();
    }

    // webbpages------------------------------------------------------------------------------------------

    // update a webpagge -------------
    /** 
     * Update course
     * @param int $id
     * @param string $kurskod 
     * @param string $kursnamn 
     * @param string $progression
     * @param string $kursplan
     * @return boolean
     */
    public function updateWebbpage($db_table, int $id, string $kurskod, string $kursnamn, string $progression, string $kursplan): bool
    {

        $this->kurskod = $kurskod;
        $this->kursnamn = $kursnamn;
        $this->progression = $progression;
        $this->kursplan = $kursplan;
        $id = intval($id);

        $stm = $this->db->prepare("UPDATE $db_table SET created=?, title=? ,url=?, body=? WHERE id=$id;");

        if ($kurskod == "" || $kursnamn == "" || $progression == "" || $kursplan == "") {
        } else {
            $stm->bind_param("ssss", $this->kurskod, $this->kursnamn, $this->progression, $this->kursplan);
        }
        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
        $stm->close();
    }

    // Add new webbpage ---------------------
    /** 
     * Add a school
     * @param string $kurskod 
     * @param string $kursnamn 
     * @param string $progression
     * @param string $kursplan
     * @return boolean
     */
    public function addWebbpage($db_table, string $kurskod, string $kursnamn, string $progression, string $kursplan): bool
    {
        $this->kurskod = $kurskod;
        $this->kursnamn = $kursnamn;
        $this->progression = $progression;
        $this->kursplan = $kursplan;
        // the question marks is for the undecided data that we havent put into the tabel yet
        $stm = $this->db->prepare("INSERT INTO $db_table(created,title,url,body) VALUES (?, ?, ?, ?)");

        if ($kurskod == "" || $kursnamn == "" || $progression == "" || $kursplan == "") {
        } else {
            //the ssss stands for four strings, what a world
            $stm->bind_param("ssss", $this->kurskod, $this->kursnamn, $this->progression, $this->kursplan);
        }

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
        $stm->close();
    }

    // Work---------------------------------------------------------------------------------------------------------

    // Add work ---------------------
    /** 
     * Add a jobb
     * @param string $kurskod 
     * @param string $kursnamn 
     * @param string $progression
     * @param string $kursplan
     * @return boolean
     */
    public function addWork($db_table, string $kurskod, string $kursnamn, string $progression, string $kursplan): bool
    {
        $this->kurskod = $kurskod;
        $this->kursnamn = $kursnamn;
        $this->progression = $progression;
        $this->kursplan = $kursplan;
        // the question marks is for the undecided data that we havent put into the tabel yet
        $stm = $this->db->prepare("INSERT INTO $db_table(title,place,startdate,enddate) VALUES (?, ?, ?, ?)");

        if ($kurskod == "" || $kursnamn == "" || $progression == "" || $kursplan == "") {
            echo '';
        } else {
            //the ssss stands for four strings, what a world
            $stm->bind_param("ssss", $this->kurskod, $this->kursnamn, $this->progression, $this->kursplan);
        }

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
        $stm->close();
    }

    // update work -------------
    /** 
     * Update course
     * @param int $id
     * @param string $kurskod 
     * @param string $kursnamn 
     * @param string $progression
     * @param string $kursplan
     * @return boolean
     */
    public function updateWork($db_table, int $id, string $kurskod, string $kursnamn, string $progression, string $kursplan): bool
    {

        $this->kurskod = $kurskod;
        $this->kursnamn = $kursnamn;
        $this->progression = $progression;
        $this->kursplan = $kursplan;
        $id = intval($id);

        $stm = $this->db->prepare("UPDATE $db_table SET title=?, place=? ,startdate=?, enddate=? WHERE id=$id;");

        if ($kurskod == "" || $kursnamn == "" || $progression == "" || $kursplan == "") {
        } else {
            $stm->bind_param("ssss", $this->kurskod, $this->kursnamn, $this->progression, $this->kursplan);
        }
        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
        $stm->close();
    }
}
