<!DOCTYPE html>
<html>
    <head>
        <title>Adopte1Style</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Welcome.css">
        <script src="Welcome.js"></script>
    </head>
    <body>

    <!--Header-->
    <div class="Header">
        <button onclick="goTo('album1')">
            CONNEXION
        </button>
    </div>     
    <div class="Container">
        <div class="content-c1-l1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>
        <div class="content-c2-l1">
            <form action="/ConnexionPage/Connexion.php" method="post" id="Connexion">
                <div class="TitleForm"><p>CONNEXION</p></div>
                <div class="ConnexionForm">
                <label for="pseudo">PSEUDO</label>
                <input name="pseudo" placeholder="Pseudo">

                    <label for="Password">MOT DE PASSE</label>
                    <input name="Password" placeholder="Mot de passe">
                    <div class="Option">
                        <input type="checkbox" name="Memorise" id="Memorise"><label for="Memorise" id="Memorise">Mémoriser</label>
                        <a href="#">Mot de passe oublié</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="content-c2-l1">
            <form action="/SignUpPage/SignUp.php" method="post" id="Connexion">
                <div class="TitleForm"><p>S'INSCRIRE</p></div>
                <div class="ConnexionForm">
                    <label for="pseudo">PSEUDO</label>
                    <input name="pseudo" placeholder="Pseudo">
                    <label for="Password">MOT DE PASSE</label>
                    <input name="Password" placeholder="Mot de passe">
                    <input type="submit" value="S'inscrire">
                </div>
            </form>
        </div>
        <div class="content-c1-l2">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>
        <div class="content-c2-l2">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div><!--
        <div class="content-c1-l3">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>
        <div class="content-c2-l3">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>   </div>
        <div class="content-c2-l3">
     
        <div class="content-c1-l4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>
        <div class="content-c2-l4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>-->
    </div>


    <!--Footer-->
    <div class="   </div>
        <div class="content-c2-l3">
     Footer">
        <div classem
        <div class="col3-lg1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim dapibus orci quis ornare. Fusce neque elit, malesuada non nisl et, molestie pretium nunc. Donec nec imperdiet diam. Aenean ultrices dui elit, a imperdiet justo iaculis eu. Fusce laoreet congue enim, ut tincidunt massa scelerisque ac. Donec magna sem, rhoncus et felis id, consequat volutpat eros. Curabitur a tempor ligula. Integer malesuada, velit sit amet vehicula tempor, diam justo egestas eros, ac lacinia quam odio eu diam. Cras sodales enim felis, vitae gravida lacus porta eget. Etiam consectetur eget neque at auctor. </p>
        </div>
    </div>
    </body>
</html>
