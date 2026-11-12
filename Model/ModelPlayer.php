<?php
class ModelPlayer extends Model{
    //ATTRIBUT
    private int $id;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idTeam;
    //CONSTRUCT
    
    // #region GETTER ET SETTER
    
    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param string $pseudo
     *
     * @return self
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of score
     *
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param int $score
     *
     * @return self
     */
    public function setScore(int $score): self
    {
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of team
     *
     * @return string
     */
    public function getTeam(): string
    {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @param string $team
     *
     * @return self
     */
    public function setTeam(string $team): self
    {
        $this->team = $team;
        return $this;
    }

    /**
     * Get the value of idteam
     *
     * @return int
     */
    public function getIdteam(): int
    {
        return $this->idTeam;
    }

    /**
     * Set the value of idteam
     *
     * @param int $idTeam
     *
     * @return self
     */
    public function setIdTeam(int $idTeam): self
    {
        $this->idTeam = $idTeam;
        return $this;
    }
    // #endregion
    //METHODS
    public function findAll():array{
        try{
            $request = $this->getBdd()->prepare('SELECT p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON p.id_team = t.id_team');
            $request->execute();
            $data = $request->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
    public function findByPseudo():array|bool{
        try{
            $request = $this->getBdd()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON p.id_team = t.id_team WHERE p.pseudo = ?');
            $request->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $request->execute();
            $data = $request->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
    public function add():void{
        try{
            $request = $this->getBdd()->prepare('INSERT INTO player(pseudo, score, id_team) VALUES (?, ? ,?)');
            $request->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $request->bindParam(2, $this->score, PDO::PARAM_INT);
            $request->bindParam(3, $this->idTeam, PDO::PARAM_INT);
            $request->execute();
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
    public function delete():void{
        try{
            $request = $this->getBdd()->prepare('DELETE FROM player WHERE id_player = ?');
            $request->bindParam(1, $this->id, PDO::PARAM_INT);
            $request->execute();
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
    public function update():void{
        try{
            $request = $this->getBdd()->prepare('UPDATE player SET pseudo = ?, score = ?, id_team = ? WHERE id_player = ?');
            $request->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $request->bindParam(2, $this->score, PDO::PARAM_INT);
            $request->bindParam(3, $this->idTeam, PDO::PARAM_INT);
            $request->bindParam(4, $this->id, PDO::PARAM_INT);
            $request->execute();
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
}