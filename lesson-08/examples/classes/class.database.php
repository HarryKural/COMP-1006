<?php

    //get config.database.php for configuration
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lesson-08/examples/config/config.database.php';

    class Database
    {
        /* Database Properties */
        private $dbh;
        private $sth;
        private $error;

        /* Database Constructor */
        public function __construct ()
        {
            try
            {
                $this->dbh = new PDO( "mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS );
                $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch ( PDOException $e )
            {
                $this->error = $e;
            }
        }

        public function getError ()
        {   /*
            if ( is_null( $this->error ) ) return false;
            return $this->error->getMessage();
            OR*/
            return is_null( $this->error ) ? false : $this->error->getMessage();
        }

        public function close ()
        {
            $this->dbh = null;
        }

        public function closeCursor ()
        {
            $this->sth->closeCursor();
        }

        public function prepare ( $sql )
        {
            $this->sth = $this->dbh->prepare( $sql );
            return $this;
        }

        public function execute ()
        {
            try
            {
                $this->sth->execute();
                return $this;
            }
            catch ( PDOException $e )
            {
                $this->error = $e;
            }
        }

        public function bind ( $param, $value, $type = null )
        {
            //check if the type = null
            if ( is_null( $type ) )
            {
                switch ( true )
                {
                    case is_null( $value ):
                        $type = PDO::PARAM_NULL;
                        break;

                    case is_numeric( $value ):
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool( $value ):
                        $type = PDO::PARAM_BOOL;
                        break;

                    default;
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            //bind our value
            $this->sth->bindParam( $param, $value, $type );
            return $this;
        }

        public function fetch ()
        {
            $result = $this->sth->fetch( PDO::FETCH_ASSOC );
            $this->closeCursor();
            return $result;
        }

        public function fetchAll ()
        {
            $result = $this->sth->fetchAll( PDO::FETCH_ASSOC );
            $this->closeCursor();
            return $result;
        }

        //$fields must be an array data type
        public function all ( $table, $fields = null )
        {
            $fields = !is_null( $fields ) && is_array( $fields ) ? implode( ', ', $fields ) : '*';
            return $this->prepare( "SELECT {$fields} FROM {$table}" )->execute()->fetchAll();
        }

        public function byId ( $table, $id )
        {
            return $this->prepare( "SELECT * FROM {$table} WHERE id = :id" )->bind( ':id', $id )->execute()->fetch();
        }

        public function byField ( $table, $field, $value, $strict = true )
        {
            $clause = $strict ? "{$field} = ':{$field}'" : "{$field} LIKE '%:{$field}%'";
            return $this->prepare( "SELECT * FROM {$table} WHERE {$clause}" )->bind( ":{field}", $value )->execute()->fetchAll();
        }
    }
