# Things to do to improve the program
## Backend - API side
- Rate-limiting the requests to the API (Redis?)
- Rate-limiting responses of the API
- Answer with a status field with log of errors
- Implement a security key to access to the service (oAuth or others)
- Return custom field to requester
## Backend - client side
- Exponential back-off to server errors
- Rate-limiting requests
- Make requests idempotent


### Personal thoughts
I would consider refactoring the backend to Node.Js, because the manipulation of data is much more succint and efficient.

#### Example:
PHP: 

    public function getUser($user){
            $arr =["id" =>$user->getId(), "password"=>$user->getPassword()];
            if (in_array($arr,$this->users)) {
                return $this->users[array_search($arr,$this->users)];
            }else{
                return null;
            }
        }
    
JavaScript:

    function getUser(user){
        return users.find((el)=>{return el.id === user.id});
    }

This case is very clear. I am here finding in JS the `user.id`, but it could be done with the whole `user` object, letting it be even shorter. In case the user does not exist, `find` would return undefined. In case it finds it, it would stop executing the code. 