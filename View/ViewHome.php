<?php
class ViewHome extends View{
    //ATTRIBUT
    private string $message = "";
    private array $datas = [];
    
    //CONSTRUCT
    
    // #region GETTER ET SETTER
    
    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the value of datas
     *
     * @return array
     */
    public function getDatas(): array
    {
        return $this->datas;
    }

    /**
     * Set the value of datas
     *
     * @param array $datas
     *
     * @return self
     */
    public function setDatas(array $datas): self
    {
        $this->datas = $datas;
        return $this;
    }
    // #endregion

    //METHODS
    public function displayMain():self{
        $main = "";
        $data = "";
        foreach ($this->datas as $player) {
            $data .= "<li>" . htmlspecialchars($player['pseudo']) . " - "
           . (int) $player['score'] . " - "
           . htmlspecialchars($player['team']) . "</li>";
        }
        $main .='
        <main>
            <p>Ajouter un joueur</p>
                <form action="" method="post">
                    <label for="pseudoID">Pseudo : <input type="text" name="pseudo" id="pseudoID"></label>
                <label for="scoreID">Score : <input type="number" name="score" id="scoreID"></label>
                <select name="team" id="">
                <option value="">Veuilez choisir une équipe</option>
                <option value="1">Aucune</option>
                <option value="2">TeamRocket</option>
                <option value="3">DreamTeam</option>
                </select>
                <input type="submit" name="ajout" value="Valider">
                </form>';
        $main .= $this->message;
        $main .='<br><p>Liste des joueurs.</p><ul>';
        
        $main .= $data;
        $main .='</ul></main>';
        echo $main;
        return $this;
    }
    public function displayAll(): void{
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}