<?php

function getBenevoles($conn)
{
    $query = "SELECT * FROM Benevole";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displayBenevoles($benevoles)
{
    if (isset($benevoles) && !empty($benevoles)) {
        echo "<h2>Liste des Bénévoles</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>";
        foreach ($benevoles as $benevole) {
            echo "<tr>
                    <td>{$benevole['id_benevole']}</td>
                    <td>{$benevole['Nom']}</td>
                    <td>{$benevole['Prenom']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Aucune donnée à afficher.";
    }
}

function getSections($conn)
{
    $query = "SELECT * FROM Section";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displaySections($sections)
{
    echo "<h2>Liste des Sections</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom de la Section</th>
                <th>Référent</th>
            </tr>";
    foreach ($sections as $section) {
        echo "<tr>
                <td>{$section['id_section']}</td>
                <td>{$section['nom_section']}</td>
                <td>{$section['id_referent']}</td>
              </tr>";
    }
    echo "</table>";
}

function getActivites($conn)
{
    $query = "SELECT * FROM Activite";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displayActivites($activites)
{
    echo "<h2>Liste des Activités</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom de l'Activité</th>
            </tr>";
    foreach ($activites as $activite) {
        echo "<tr>
                <td>{$activite['id_activite']}</td>
                <td>{$activite['nom_activite']}</td>
              </tr>";
    }
    echo "</table>";
}

function getInscriptions($conn)
{
    $query = "SELECT * FROM Inscription";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displayInscriptions($inscriptions)
{
    echo "<h2>Liste des Inscriptions</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Montant Payé</th>
                <th>Date Inscription</th>
                <th>ID Adhérent</th>
                <th>ID Activité</th>
                <th>ID Section</th>
            </tr>";
    foreach ($inscriptions as $inscription) {
        echo "<tr>
                <td>{$inscription['id_inscription']}</td>
                <td>{$inscription['montant_paye']}</td>
                <td>{$inscription['date_inscription']}</td>
                <td>{$inscription['id_adherent']}</td>
                <td>{$inscription['id_activite']}</td>
                <td>{$inscription['id_section']}</td>
              </tr>";
    }
    echo "</table>";
}



function getParente($conn)
{
    $query = "SELECT * FROM Parente";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displayParente($liensParente)
{
    echo "<h2>Liste des Liens de Parenté</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Adhérent 1</th>
                <th>ID Adhérent 2</th>
                <th>Type de lien</th>
            </tr>";
    foreach ($liensParente as $lienParente) {
        echo "<tr>
                <td>{$lienParente['id_adherent1']}</td>
                <td>{$lienParente['id_adherent2']}</td>
                <td>{$lienParente['type_lien']}</td>
              </tr>";
    }
    echo "</table>";
}

function getRemboursements($conn)
{
    $query = "SELECT * FROM Remboursement";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displayRemboursements($remboursements)
{
    echo "<h2>Liste des Remboursements</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Remboursement</th>
                <th>Montant Remboursé</th>
                <th>Date Remboursement</th>
                <th>ID Adhérent</th>
            </tr>";
    foreach ($remboursements as $remboursement) {
        echo "<tr>
                <td>{$remboursement['id_remboursement']}</td>
                <td>{$remboursement['montant_rembourse']}</td>
                <td>{$remboursement['date_remboursement']}</td>
                <td>{$remboursement['id_adherent']}</td>
              </tr>";
    }
    echo "</table>";
}

function getAdherents($conn)
{
    $query = "SELECT * FROM Adherent";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function displayAdherents($adherents)
{
    echo "<h2>Liste des Adhérents</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Adhérent</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro de Carte Adhérent</th>
            </tr>";
    foreach ($adherents as $adherent) {
        echo "<tr>
                <td>{$adherent['id_adherent']}</td>
                <td>{$adherent['nom']}</td>
                <td>{$adherent['prenom']}</td>
                <td>{$adherent['numero_carte_adherent']}</td>
              </tr>";
    }
    echo "</table>";
}
