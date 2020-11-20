<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 最新文章--增加制定条件调用
 *
 * @category typecho
 * @package Widget
 * @copyright Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license GNU General Public License 2.0
 * @version $Id$
 * @：<?php $this->widget('Widget_Contents_Post_Recent@aaa', 'order=order&pageSize=6')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
 */

class Widget_Contents_Post_Recent extends Widget_Abstract_Contents
{
    /**
     * 执行函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
		
		if (isset($this->parameter->order)) {
			$order = $this->parameter->order;
        }else {
           $order = 'created'; 
        }

		
        $this->parameter->setDefault(array('pageSize' => $this->options->postsListSize));

        $this->db->fetchAll($this->select()
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created < ?', $this->options->time)
        ->where('table.contents.type = ?', 'post')
        ->order('table.contents.'.$order, $this->parameter->asc ? Typecho_Db::SORT_ASC : Typecho_Db::SORT_DESC)
        ->limit($this->parameter->pageSize), array($this, 'push'));
    }
}
