<?php 
class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params=array())
    {
        $role = "";
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $access_level=$this->getState("roles");
        if($access_level == 0)
        {
            $role="member";
        }
        else if($access_level == 1)
        {
            $role="admin";
        }
        
        if($role == "")
        {
            return false;
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
}
?>
