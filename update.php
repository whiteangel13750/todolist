<h2>Modifier vos coordonnées</h2>

<section class="row bg-light">
     <div class="col-6">
     <form action="index.php?route=insert_user" method="post">
             <div>
             <label> Pseudo </label>
             <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
             </div>
             <div>
             <label> Mot de Passe </label>
             <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
             </div>
             <div>
                <label> Adresse Mail </label>
                <input type='text' id='adresse' name='adresse' placeholder="Votre adresse e-mail" required='required'>
                </div>
             <div>
           <input type='submit' id='valider' value='Soumettre'>
           </div>
         </form>
     </div>