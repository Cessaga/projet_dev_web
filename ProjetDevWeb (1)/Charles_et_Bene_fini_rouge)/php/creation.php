    <?php
                function create_membre($pdo){
                    $membre = "CREATE TABLE IF NOT EXITS membre(
                            nom VARCHAR(255) NOT NULL,
                            prenom VARCHAR(255) NOT NULL,
                            email VARCHAR(255) NOT NULL,
                            passeword VARCHAR(255) NOT NULL,
                            date_naissance DATE NOT NULL,
                            CONSTRAINT PRIMARY KEY (email)
                            )";
                            $pdo->exec($create_membre);
                }

                    function create_basket($pdo){
                        $basket= "CREATE TABLE IF NOT EXISTS basket(
                            id INT NOT NULL AUTO_INCREMENT,
                            nom VARCHAR(255) NOT NULL,
                            descriptif VARCHAR(255) NOT NULL,
                            CONSTRAINT PRIMARY KEY (id)
                            )";
                            $pdo->exec($create_basket);
                    }

                    function create_panier($pdo){
                        $panier= "CREATE TABLE IF NOT EXISTS panier(
                            id_basket INT NOT NULL,
                            id_membre INT NOT NULL,
                            CONSTRAINT FOREIGN KEY (id_basket) REFERENCES basket(id),
                            CONSTRAINT FOREIGN KEY (id_membre) REFERENCES membre(id),
                            CONSTRAINT PRIMARY KEY (id_basket, id_membre)
                            )";
                            $pdo->exec($create_panier);
                    }

                    function create_favoris($pdo){
                        $favoris= "CREATE TABLE IF NOT EXISTS favoris(
                            id_membre INT NOT NULL,
                            id_basket INT NOT NULL?
                            CONSTRAINT FOREIGN KEY (id_membre) REFERENCES membre(id),
                            CONSTRAINT FOREIGN KEY (id_basket) REFERENCES basket(id),
                            CONSTRAINT PRIMARY KEY (id_member,id_basket)
                            )";
                            $pdo->exec($create_favoris);
                    }
                    
                    
                    
                    
                ?>

    
    