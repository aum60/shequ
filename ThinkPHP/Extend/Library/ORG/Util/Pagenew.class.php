<?php

/*
 * author:Dxing  
 * 总数，当前是第几页，每页显示数量,linkjs,分页总数,是否开启下拉框分页
 */

class Pagenew {

    protected $pagenum;

    //总数，当前是第几页，每页显示数量,linkjs,分页总数,是否开启下拉框分页
    public function __construct($row = 0, $page = 1, $num = 20, $linkjs = '', $maxpagenum = 10, $is_selected = 0) {
        //数据总数
        $this->row = $row;
        //当前页码
        $this->page = $page;
        //每页显示
        $this->num = $num;
        //linkjs
        $this->linkjs = $linkjs;
        //分页数量总数
        $this->pagenum = ceil($row / $num);
        //最大显示分页数量
        $this->maxpagenum = $maxpagenum;
        //是否开启下拉框
        $this->is_selected = $is_selected;
    }

    //分页显示
    public function showpage() {
        $html = $this->row . '条数据 ' . $this->page . '/' . $this->pagenum . ' ';
        if ($this->is_selected) {
            $html .="<input type='text' style='width:50px;' id='page_select' value='" . $this->page . "' />";
        }
        $html .= "<a href='javascript:" . $this->linkjs . "(1);'>首页</a>";
        if ($this->page > 1) {
            $html .= "<a href='javascript:" . $this->linkjs . "(" . ($this->page - 1) . ");'>上一页</a>";
        }
        for ($i = 1; $i <= $this->pagenum; $i++) {
            if ($this->page < $this->maxpagenum) {//是否是开头
                if ($i <= $this->maxpagenum) {
                    if ($i == $this->page) {
                        $style = 'class="thispage"';
                        $link = ';;';
                    } else {
                        $style = '';
                        $link = $this->linkjs . "(" . $i . ");";
                    }
                    $html .= "<a href='javascript:" . $link . "' " . $style . ">" . $i . "</a>";
                }
            } elseif ($this->page > ceil($this->row / $this->num) - $this->maxpagenum) {//是否到末尾
                if ($i >= ceil($this->row / $this->num) - $this->maxpagenum && $i <= ceil($this->row / $this->num)) {//显示分页
                    if ($i == $this->page) {
                        $style = 'class="thispage"';
                        $link = ';;';
                    } else {
                        $style = '';
                        $link = $this->linkjs . "(" . $i . ");";
                    }
                    $html .= "<a href='javascript:" . $link . "' " . $style . ">" . $i . "</a>";
                }
            } else {
                if ($i >= ($this->page - ceil($this->maxpagenum / 2)) && $i <= ($this->maxpagenum + ($this->page - ceil($this->maxpagenum / 2)))) {//显示分页减去最大的数的一半为了增加偏移量
                    if ($i == $this->page) {
                        $style = 'class="thispage"';
                        $link = ';;';
                    } else {
                        $style = '';
                        $link = $this->linkjs . "(" . $i . ");";
                    }
                    $html .= "<a href='javascript:" . $link . "' " . $style . ">" . $i . "</a>";
                }
            }
        }
        if ($this->page <= (ceil($this->row / $this->num) - 1)) {
            $html .= "<a href='javascript:" . $this->linkjs . "(" . ($this->page + 1) . ");'>下一页</a>";
        }
        $html .= "<a href='javascript:" . $this->linkjs . "(" . ($this->pagenum) . ");'>末页</a>";
        return $html;
    }

}
