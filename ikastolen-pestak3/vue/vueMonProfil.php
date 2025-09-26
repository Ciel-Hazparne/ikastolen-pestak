<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br/>
Mon pseudo : <?= $util["pseudoU"] ?> <br/>

<hr>

Les fêtes que j'aime : <br>
<a href="./?action=detail&idF=2">Ibilaldia</a><br>
<a href="./?action=detail&idF=3">Herri Urrats</a><br>
<a href="./?action=detail&idF=4">Kilometroak</a><br>
<hr>
Les types de Gastronomie que j'aime :
<ul id="tagFood">
    <li class="tag"><span class="tag">#</span>poisson</li>
    <li class="tag"><span class="tag">#</span>cidrerie</li>
    <li class="tag"><span class="tag">#</span>grillade</li>
</ul>
<hr>
<a href="./?action=deconnexion">Se déconnecter</a>