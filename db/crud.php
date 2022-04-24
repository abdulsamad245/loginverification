<?php
    class crud{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insert($fname,$lname,$email,$contact,$specialty_id,$dob){
            try {
                $sql = "INSERT INTO attendee (firstname,lastname,emailaddress,contact,specialty_id,dob) VALUES(:fname,:lname,:email,:contact,:specialty_id,:dob)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty_id',$specialty_id);
                $stmt->bindparam(':dob',$dob);
                
               

                $stmt->execute();
                return true; 
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

        public function editAttendee($id,$fname,$lname,$email,$contact,$specialty_id,$dob){
            try{
                $sql = " UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`emailaddress`=:email,`contact`=:contact,`specialty_id`=:specialty_id,`dob`=:dob WHERE attendee_id = :attendee_id";

                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':attendee_id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty_id',$specialty_id);
                $stmt->bindparam(':dob',$dob);
                $stmt->execute();
                return true; 
                

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }


        }

        public function  getAttendees(){
            $sql = "SELECT * FROM `attendee`a inner join specialties s on a.specialty_id = s.specialty_id";
            // $sql = "SELECT * FROM `attendee`";
            $result = $this->db->query($sql);
            return $result;

        }

        public function getSpecialties(){
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;


        }

        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true; 
                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }


        }

        public function getAttendeeDetails($id){
            $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        }

        public function getSpecialtyById($id){
            try{
                $sql = "select * from specialties where specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result; 
                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }

        }
        
    }
?>