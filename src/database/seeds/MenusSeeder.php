<?php

use Laravella\Crud\Log;

class MenusSeeder extends Seeder
{

        private function __addMenu($label, $href, $iconClass = 'icon-file', $parentId = null) {
            $group = array('label'=>$label, 'href'=>$href, 'parent_id'=>$parentId, 'icon_class'=>$iconClass);     
            $menuId = DB::table('_db_menus')->insertGetId($group);
            Log::write('info', $label.' menu created');
            return $menuId;
        }
        
        private function __addMenuPermissions($menuId, $groupName) {
            $usergroup = DB::table('usergroups')->where('group', $groupName)->first();
            if (is_object($usergroup)) {
                $usergroupId = $usergroup->id;
                DB::table('_db_menu_permissions')->insertGetId(array('menu_id'=>$menuId, 'usergroup_id'=>$usergroupId));
            }
        }
        
	public function run()
	{

                $topId = DB::table('_db_menus')->where('label','TopMenu')->first()->id;
                $cartId = $this->__addMenu('Cart', '/db/select/products', 'icon-file', $topId);
                $productsId = $this->__addMenu('Products', '/db/select/products', 'icon-file', $cartId);

//                Log::write('info', $adminId . ' admin id');
                
                $this->__addMenu('divider', null, '', $cartId);
                
                $this->__addMenuPermissions($productsId, 'superadmin');
                $this->__addMenuPermissions($productsId, 'admin');
                
	}
}
?>