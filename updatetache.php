<h2> Ajout d'une tache</h2>
<section class="row bg-light">
     <div class="col-6">
     <form action="index.php?route=insert_tache" method="post">
             <div>
             <label> Intitulé de la tache </label>
             <input type='textarea' id='description' name='description' placeholder="Intitulé de la tache">
             </div>
             <div>
             <label> Date limite de la tache </label>
             <input type='date' id='date' name='date' placeholder="Date limite de la tache">
             </div>
           <div>
           <input type='submit' id='modifier' value='Modifier'>
           </div>
         </form>
     </div>
<br>