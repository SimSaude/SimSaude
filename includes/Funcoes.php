<?php
/*
* Breadcrumb navigation class
* Mick Sear
* http://www.ecreate.co.uk
*
* The key to using this is to decide on a $level for each page.  (array, starting position 0)
* This determines where in the trail a link will be placed.  So, I normally make the homepage level 0,
* then every page that can be accessed from the top level nav becomes level 1, and every page
* from that second level becomes level 2, and so on.  When users return to a higher level (e.g. level 1)
* the surplus links are removed.  Only one page can occupy a $level in the crumb trail.
* There might be several routes to a page.  In which case, the trail will reflect the route that the
* user actually took to get to that page.
*/

class RastroDeNavegacao
{
   var $Saida;
   var $Rastros = array();
   var $Local;

    function RastroDeNavegacao()
    {
        if (isset($_SESSION['RastroDeNavegacao']))
        {
            if ($_SESSION['RastroDeNavegacao'] != null)
            {
                $this->Rastros = $_SESSION['RastroDeNavegacao'];
            }
        }  
    }

    function Adicionar($Rotulo, $URL, $Nivel)
    {
        $Rastro = array();
        $Rastro['Rotulo']    = $Rotulo;
        $Rastro['URL']       = $URL;
        if ($Rastro['Rotulo'] != null && $Rastro['URL'] != null && isset($Nivel))
        {       
            while (count($this->Rastros) > $Nivel)
            {
                //Remover até alcancarmos o $Nivel alocado para esta página.
                array_pop($this->Rastros); 
            }
            //Assumir link da home se não houver dados na sessão ainda.
            if (!isset($this->Rastros[0]) && $Nivel > 0)
            { 
                $this->Rastros[0]['URL'] = "./";
                $this->Rastros[0]['Rotulo'] = "Home";
            }
            $this->Rastros[$Nivel] = $Rastro;  
        }
        //Persistir os dados.
        $_SESSION['RastroDeNavegacao']  = $this->Rastros;
        //Remover a url da página atual.
        $this->Rastros[$Nivel]['URL']   = null;
    }

    function Saida()
    {
        echo "<ul id='Rastro'>";
        foreach ($this->Rastros as $Rastro)
        {  
            if ($Rastro['URL'] != null)
            {
                echo "<li><a href='".$Rastro['URL']."' title='".$Rastro['Rotulo']."'>".$Rastro['Rotulo']."</li></a>";
            }
            else
            {
                echo "<li class='Index'>".$Rastro['Rotulo']."</li>";
            }
        }
        echo "</ul>";
    }
}

class Timer
{
    var $NomeDaClasse   = "Timer";
    var $Inicio         = 0;
    var $Fim            = 0;
    var $Decorrido      = 0;

    //Construtor.
    function Timer($Inicio = true)
    {
        if ($Inicio) { $this->Iniciar(); }
    }

    //Iniciar contagem do tempo.
    function IniciarTimer()
    {
       $this->Inicio = $this->_GetTempo();
    }

    //Interromper contagem do tempo.
    function PararTimer()
    {
       $this->Fim       = $this->_GetTempo();
       $this->Decorrido = $this->_Resultado();
    }

    //Adquirir tempo decorrido.
    function GetTempoDecorrido()
    {
        if (!$this->Decorrido)
        {
            $this->PararTimer();
            return $this->Decorrido;
        }
    }

    //Resetar.
    function ResetarTimer()
    {
       $this->Inicio    = 0;
       $this->Fim       = 0;
       $this->Decorrido = 0;
    }

    /*Métodos Privados*/
    //Adquirir tempo atual.
    function _GetTempo()
    {
       $mtime = microtime();
       $mtime = explode(" ", $mtime);
       return ($mtime[1] + $mtime[0]);
    }

    //Computar o tempo decorrido.
    function _Resultado()
    {
       return ($this->Fim - $this->Inicio);
    }
}