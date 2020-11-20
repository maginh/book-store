<?php
require 'strconn.php';

$gen=$_REQUEST['gen'];
$cat=$_REQUEST['cat'];
$dataP=$_REQUEST['dataP'];
$autore=$_REQUEST['autore'];
$x=1;

if(($gen!='' && $gen!='Generi') && ($cat!='' && $cat!='Categorie') && $autore!='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND c.nome='{$cat}' AND a.cognome='{$autore}' AND l.dataP={$dataP}";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat!='' && $cat!='Categorie') && $autore=='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND c.nome='{$cat}' AND l.dataP='{$dataP}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen=='' || $gen=='Generi') && ($cat!='' && $cat!='Categorie') && $autore!='' && $dataP!=''){
  $query="SELECT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND c.nome='{$cat}' AND a.cognome='{$autore}' AND l.dataP='{$dataP}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat!='' && $cat!='Categorie') && $autore!='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND c.nome='{$cat}' AND a.cognome='{$autore}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat!='' && $cat!='Categorie') && $autore=='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND c.nome='{$cat}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat=='' || $cat=='Categorie') && $autore=='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat=='' || $cat=='Categorie') && $autore!='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND a.cognome='{$autore}' AND l.dataP={$dataP}";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat=='' || $cat=='Categorie') && $autore=='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND l.dataP={$dataP}";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen!='' && $gen!='Generi') && ($cat=='' || $cat=='Categorie') && $autore!='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND g.nome='{$gen}' AND a.cognome='{$autore}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen=='' || $gen=='Generi') && ($cat!='' && $cat!='Categorie') && $autore=='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND c.nome='{$cat}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }
}else if(($gen=='' || $gen=='Generi') && ($cat!='' && $cat!='Categorie') && $autore!='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND c.nome='{$cat}' AND a.cognome='{$autore}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }

}else if(($gen=='' || $gen=='Generi') && ($cat!='' && $cat!='Categorie') && $autore=='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND c.nome='{$cat}' AND l.dataP='{$dataP}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }

}else if(($gen=='' || $gen=='Generi') && ($cat=='' || $cat=='Categorie') && $autore!='' && $dataP==''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND a.cognome='{$autore}'";
  $tab=$dbconn->query($query);

  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }

}else if(($gen=='' || $gen=='Generi') && ($cat=='' || $cat=='Categorie') && $autore!='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND a.cognome='{$autore}' AND l.dataP='{$dataP}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }

}else if(($gen=='' || $gen=='Generi') && ($cat=='' || $cat=='Categorie') && $autore=='' && $dataP!=''){
  $query="SELECT DISTINCT l.titolo, i.percorso FROM libri AS l, icone AS i, generi AS g, categorie AS c, autori AS a, tipologie AS t WHERE c.sigla=l.CATEGORIA AND a.numero=l.AUTORE AND l.codice=i.LIBRO AND l.codice=t.LIBRO AND g.sigla=t.GENERE AND l.dataP='{$dataP}'";
  $tab=$dbconn->query($query);
  while($row=$tab->fetch_array(MYSQLI_NUM)){
    echo("<div class='col-lg-3 col-md-6' id='dv".$x."'>
        <div class='item'>
            <img src='{$row[1]}' alt='img'>
            <h3>{$row[0]}</h3>
            <div class='hover'>
                <a href='product-single.php?titolo={$row[0]}'>
                <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                </a>
            </div>
        </div><br><br><br><br>
    </div>");
    $x+=1;
  }

}
 ?>
