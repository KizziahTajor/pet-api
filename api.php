<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

class User {

    function addSpecies($json){
        include 'config.php';
        $json = json_decode($json, true);
        
        $sql = "INSERT INTO species (species_name) VALUES (:species_name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':species_name', $json['species_name']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function getSpecies($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "SELECT * FROM species";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function addBreed($json){
        include 'config.php';
        $json = json_decode($json, true);
        
        $sql = "INSERT INTO breeds (breed_name, SpeciesID) VALUES (:breed_name, :SpeciesID)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':breed_name', $json['breed_name']);
        $stmt->bindParam(':SpeciesID', $json['SpeciesID']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function addOwner($json){
        include 'config.php';
        $json = json_decode($json, true);
        
        $sql = "INSERT INTO owners (owner_name, owner_contact, owner_address) VALUES (:owner_name, :owner_contact, :owner_address)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':owner_name', $json['owner_name']);
        $stmt->bindParam(':owner_contact', $json['owner_contact']);
        $stmt->bindParam(':owner_address', $json['owner_address']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function getOwner($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "SELECT * FROM owners";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function updateOwner($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "UPDATE owners SET owner_name = :owner_name, owner_contact = :owner_contact, owner_address = :owner_address WHERE owner_id = :owner_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':owner_name', $json['owner_name']);
        $stmt->bindParam(':owner_contact', $json['owner_contact']);
        $stmt->bindParam(':owner_address', $json['owner_address']);
        $stmt->bindParam(':owner_id', $json['owner_id']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function deleteOwner($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "DELETE FROM owners WHERE owner_id = :owner_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':owner_id', $json['owner_id']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function getBreed($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "SELECT * FROM breeds";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function getPet($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "SELECT 
            o.owner_name,
            p.pet_name,
            s.species_name,
            b.breed_name,
            p.pet_birth,
            p.pet_id
        FROM 
            pets p
        JOIN 
            owners o ON p.owner_id = o.owner_id
        JOIN 
            species s ON p.SpeciesID = s.SpeciesID
        JOIN 
            breeds b ON p.BreedID = b.BreedID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function addPet($json){
        include 'config.php';
        $json = json_decode($json, true);
        
        $sql = "INSERT INTO pets (pet_name, SpeciesID, BreedID, owner_id, pet_birth) VALUES (:pet_name, :SpeciesID, :BreedID, :owner_id, :pet_birth)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pet_name', $json['pet_name']);
        $stmt->bindParam(':SpeciesID', $json['SpeciesID']);
        $stmt->bindParam(':BreedID', $json['BreedID']);
        $stmt->bindParam(':owner_id', $json['owner_id']);
        $stmt->bindParam(':pet_birth', $json['pet_birth']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function updatePet($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "UPDATE pets SET pet_name = :pet_name, SpeciesID = :SpeciesID, BreedID = :BreedID, owner_id = :owner_id, pet_birth = :pet_birth WHERE pet_id = :pet_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pet_name', $json['pet_name']);
        $stmt->bindParam(':SpeciesID', $json['SpeciesID']);
        $stmt->bindParam(':BreedID', $json['BreedID']);
        $stmt->bindParam(':owner_id', $json['owner_id']);
        $stmt->bindParam(':pet_birth', $json['pet_birth']);
        $stmt->bindParam(':pet_id', $json['pet_id']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function deletePet($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "DELETE FROM pets WHERE pet_id = :pet_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pet_id', $json['pet_id']);
        $stmt->execute();
        $returnValue = $stmt->rowCount() > 0 ? 1 : 0;
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function distribution($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "SELECT 
            s.species_name, 
            b.breed_name, 
            COUNT(p.pet_id) AS pet_count
        FROM 
            pets p
        JOIN 
            species s ON p.SpeciesID = s.SpeciesID
        JOIN 
            breeds b ON p.BreedID = b.BreedID
        GROUP BY 
            s.species_name, b.breed_name
        ORDER BY 
            s.species_name, pet_count DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }

    function popularity($json){
        include 'config.php';
        $json = json_decode($json, true);

        $sql = "SELECT 
            s.species_name, 
            b.breed_name, 
            COUNT(p.pet_id) AS pet_count
        FROM 
            pets p
        JOIN 
            species s ON p.SpeciesID = s.SpeciesID
        JOIN 
            breeds b ON p.BreedID = b.BreedID
        GROUP BY 
            s.species_name, b.breed_name
        ORDER BY 
            s.species_name, b.breed_name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn); unset($stmt);
        return json_encode($returnValue);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $operation = $_GET['operation'];
    $json = isset($_GET['json']) ? $_GET['json'] : null;
} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $operation = $_POST['operation'];
    $json = isset($_POST['json']) ? $_POST['json'] : null;
}

$user = new User();
switch($operation){
    case "addSpecies":
        echo $user->addSpecies($json);
        break;
    case "getSpecies":
        echo $user->getSpecies($json);
        break;
    case "addBreed":
        echo $user->addBreed($json);
        break;
    case "addOwner":
        echo $user->addOwner($json);
        break;
    case "getOwner":
        echo $user->getOwner($json);
        break;
    case "updateOwner":
        echo $user->updateOwner($json);
        break;
    case "deleteOwner":
        echo $user->deleteOwner($json);
        break;
    case "getBreed":
        echo $user->getBreed($json);
        break;
    case "getPet":
        echo $user->getPet($json);
        break;
    case "addPet":
        echo $user->addPet($json);
        break;
    case "updatePet":
        echo $user->updatePet($json);
        break;
    case "deletePet":
        echo $user->deletePet($json);
        break;
    case "distribution":
        echo $user->distribution($json);
        break;
    case "popularity":
        echo $user->popularity($json);
        break;
}
?>
