<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Register.css">
        <script src="Register.js"></script>
    </head>
      <form action="/action_page.php">
                <div>
                    <table>
                        <tr>
                            <td><label for="Civilite">Civilité</label></td>
                            <td>
                                <input type="radio" name="Mademoiselle" id="Civilite">Mademoiselle
                                <input type="radio" name="Madame" id="Civilite">Madame
                                <input type="radio" name="Monsieur" id="Civilite">Monsieur
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Nom_Prenom">Nom/Prénom</label></td>
                            <td><input type="text" id="Nom_Prenom" size="40"></td>
                        </tr>
                        <tr>
                            <td><label for="Adresse">Adresse</label></td>
                            <td><textarea name="Adresse" id="Adresse" cols="45" rows="5" placeholder="Rue No Boîte postale"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="Code_Postal">No Postal/Localité</label></td>
                            <td>
                                <input type="text" id="Code_Postal" name="No Postal" size="4" maxlength="4">
                                <input type="text" id="Code_Postal" name="Localite" value="Lausanne">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Pays">Pays</label></td>
                            <td>
                                <select name="Pays" id="Pays">
                                    <option value="Angleterre">Angleterre</option>
                                    <option value="Algérie">Algérie</option>
                                    <option value="Suisse" selected>Suisse</option>
                                    <option value="Sénégal">Sénégal</option>
                                    <option value="Togo">Togo</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Plateforme">Plateforme(s)</label></td>
                            <td>
                                <input type="checkbox" id="Plateforme" name="Windows">Windows
                                <input type="checkbox" id="Plateforme" name="Macintosh">Macintosh
                                <input type="checkbox" id="Plateforme" name="Unix">Unix
                            </td>
                        </tr>
                        <tr>
                            <td><label for="App">Application(s)</label></td>
                            <td>
                                <select name="App"size="5" multiple>
                                    <option value="Bureautique">Bureautique</option>
                                    <option value="DAO">DAO</option>
                                    <option value="Statistique">Statistique</option>
                                    <option value="SGBD">SGBD</option>
                                    <option value="Internet">Internet</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            <div class="Button">
                <input type="button" value="Soumettre formulaire">
            </div>
        </form>