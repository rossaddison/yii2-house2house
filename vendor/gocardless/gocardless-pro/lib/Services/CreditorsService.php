<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Services;

use \GoCardlessPro\Core\Paginator;
use \GoCardlessPro\Core\Util;
use \GoCardlessPro\Core\ListResponse;
use \GoCardlessPro\Resources\Creditor;
use \GoCardlessPro\Core\Exception\InvalidStateException;


/**
 * Service that provides access to the Creditor
 * endpoints of the API
 */
class CreditorsService extends BaseService
{

    protected $envelope_key   = 'creditors';
    protected $resource_class = '\GoCardlessPro\Resources\Creditor';


    /**
    * Create a creditor
    *
    * Example URL: /creditors
    *
    * @param  string[mixed] $params An associative array for any params
    * @return Creditor
    **/
    public function create($params = array())
    {
        $path = "/creditors";
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array($this->envelope_key => (object)$params['params']));
        
            unset($params['params']);
        }

        
        try {
            $response = $this->api_client->post($path, $params);
        } catch(InvalidStateException $e) {
            if ($e->isIdempotentCreationConflict()) {
                if ($this->api_client->error_on_idempotency_conflict) {
                    throw $e;
                }
                return $this->get($e->getConflictingResourceId());
            }

            throw $e;
        }
        

        return $this->getResourceForResponse($response);
    }

    /**
    * List creditors
    *
    * Example URL: /creditors
    *
    * @param  string[mixed] $params An associative array for any params
    * @return ListResponse
    **/
    protected function _doList($params = array())
    {
        $path = "/creditors";
        if(isset($params['params'])) { $params['query'] = $params['params'];
            unset($params['params']);
        }

        
        $response = $this->api_client->get($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
    * Get a single creditor
    *
    * Example URL: /creditors/:identity
    *
    * @param  string        $identity Unique identifier, beginning with "CR".
    * @param  string[mixed] $params   An associative array for any params
    * @return Creditor
    **/
    public function get($identity, $params = array())
    {
        $path = Util::subUrl(
            '/creditors/:identity',
            array(
                
                'identity' => $identity
            )
        );
        if(isset($params['params'])) { $params['query'] = $params['params'];
            unset($params['params']);
        }

        
        $response = $this->api_client->get($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
    * Update a creditor
    *
    * Example URL: /creditors/:identity
    *
    * @param  string        $identity Unique identifier, beginning with "CR".
    * @param  string[mixed] $params   An associative array for any params
    * @return Creditor
    **/
    public function update($identity, $params = array())
    {
        $path = Util::subUrl(
            '/creditors/:identity',
            array(
                
                'identity' => $identity
            )
        );
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array($this->envelope_key => (object)$params['params']));
        
            unset($params['params']);
        }

        
        $response = $this->api_client->put($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
    * List creditors
    *
    * Example URL: /creditors
    *
    * @param  string[mixed] $params
    * @return Paginator
    **/
    public function all($params = array())
    {
        return new Paginator($this, $params);
    }

}
