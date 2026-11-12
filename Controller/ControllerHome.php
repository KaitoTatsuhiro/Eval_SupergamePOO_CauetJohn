<?php
class ControllerHome extends Controller{
    //ATTRIBUT
    
    //CONSTRUCT
    
    //GETTER ET SETTER

    //METHODS
    
    public function displayPlayers():self{
        $data = $this->getModel()->findAll();
        $this->getView()->setDatas($data);
        return $this;
    }
    public function registerPlayer(): self {
    if(isset($_POST['ajout'])) {
        $pseudo = sanitize($_POST['pseudo']);
        $score  = sanitize($_POST['score']);
        $team   = sanitize($_POST['team']);

        if($pseudo === '' || $score === '' || $team === '') {
            $this->getView()->setMessage("Veuillez remplir les champs.");
        }elseif(filter_var($score, FILTER_VALIDATE_INT) === false || filter_var($team, FILTER_VALIDATE_INT) === false) {
            $this->getView()->setMessage("Veuillez indiquer un nombre valide.");
        }elseif(!in_array($team, range(0,3))){
            $this->getView()->setMessage("Veuillez renseigner une équipe qui existe ou veuillez choisir de ne pas faire partie d'une équipe.");
        }else {
            $model = $this->getModel();
            $model->setPseudo($pseudo);

            if ($model->findByPseudo() !== false) {
                $this->getView()->setMessage("Ce pseudo existe déjà.");
            } else {
                $model->setScore((int) $score)
                      ->setIdTeam((int) $team)
                      ->add();
                $this->getView()->setMessage("Joueur ajouté.");
            }
        }
    }
    return $this;
}
}