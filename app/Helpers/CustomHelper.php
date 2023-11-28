<?php
use App\Product;
use App\Post;
use App\Product_cat;
if (!function_exists('data_tree')) {
  function data_tree($data, $parent_id = 0, $level = 0)
  {
    $result = [];
    foreach ($data as $item) {
      if ($item->parent_id == $parent_id) {
        $item->level = $level;
        $result[] = $item;
        $child = data_tree($data, $item->id, $level + 1);
        $result = array_merge($result, $child);
      }
    }
    return $result;
  }
}
if (!function_exists('find_parentId')) {
  function find_parentId($data, $parent_id)
  {
    $groupIdParent = [];
    foreach ($data as $item) {
      if ($item->id == $parent_id) {
        $groupIdParent[] = $item->id;
        $parent_id = $item->parent_id;
        if ($parent_id != 0) {
          $id = find_parentId($data, $parent_id);
          $groupIdParent = array_merge($groupIdParent, $id);
        }
      }
    }
    return $groupIdParent;
  }
}
// if (!function_exists('find_parentId')) {
//   function find_parentId($data, $parent_id)
//   {
//     $id = 0;
//     foreach ($data as $item) {
//       if ($item->id == $parent_id) {
//         $id = $item->id;
//         $parent_id = $item->parent_id;
//         if ($parent_id != 0) {
//           $id = find_parentId($data, $parent_id);
//           $id = $id;
//         }
//       }
//     }
//     return $id;
//   }
// }
if (!function_exists('find_childrenCat')) {
  function find_childrenCat($id) 
  {
    $idCat = [];
    $cat1 = Product_cat::where([
      ['status', 'active'],
      ['id', $id]
    ])->first();
    // if (!in_array($cat1->id, $idCat)) {
    //   $idCat[] = $cat1->id;
    // }
    $cat2 = Product_cat::where([ 
      ['parent_id', $id],
      ['status', 'active']
    ])->get();
    if ($cat2->count() == 0) {
      $products = $cat1->products;
      foreach ($products as $item) {
        if (!in_array($item->id, $idCat)) {
          $idCat[] = $item->id;
        }
      }
    } else {
      foreach ($cat2 as $itemCat2) {
        $cat_id2 = $itemCat2->id;
        $cat3 = Product_cat::where([
          ['parent_id', $cat_id2],
          ['status', 'active']
        ])->get();
        if (count($cat3) == 0) {
          $products = $itemCat2->products;
          foreach ($products as $itemProduct2) {
            if (!in_array($itemProduct2->id, $idCat)) {
              $idCat[] = $itemProduct2->id;
            }
          }
        } else {
          foreach ($cat3 as $itemCat3) {
            $products = $itemCat3->products;
            foreach ($products as $itemProduct3) {
              if (!in_array($itemProduct3->id, $idCat)) {
                $idCat[] = $itemProduct3->id;
              }
            }
          }
        }
      }
    }
    return $idCat;
  }
}
// if (!function_exists('find_childrenCat')) {
//   function find_childrenCat($id)
//   {
//     $result = [];
//     $result = (object)$result;
//     $cat1 = Product_cat::where([
//       ['status', 'active'],
//       ['id', $id]
//     ])->first();
//     $cat2 = Product_cat::where([
//       ['parent_id', $id],
//       ['status', 'active']
//     ])->get();
//     if (count($cat2) == 0) {
//       $products = $cat1->products;
//       $idCat = [];
//       foreach($products as $item){
//         if (!in_array($item->id, $idCat)) {
//           $idCat[] = $item->id;
//         }
//       }
//       $products = Product::whereIn('id', $idCat)->get();
//       $result = $products->merge($result);
//     } else {
//       foreach ($cat2 as $itemCat2) {
//         $cat_id2 = $itemCat2->id;
//         $cat3 = Product_cat::where([
//           ['parent_id', $cat_id2],
//           ['status', 'active']
//         ])->get();
//         if (count($cat3) == 0) {
//           $products = $itemCat2->products;
//           $result = $products->merge($result);
//         } else {
//           foreach ($cat3 as $itemCat3) {
//             $products = $itemCat3->products;
//             $result = $products->merge($result);
//           }
//         }
//       }
//     }
//     return $result;
//   }
// }
if (!function_exists('find_groupIdParent')) {
  function find_groupIdParent($groupRecord)
  {
    $groupIdParent = [];
    foreach ($groupRecord as $record) {
      $idParent = $record->pivot->parent_id;
      if (!in_array($idParent, $groupIdParent)) {
        $groupIdParent[] = $idParent;
      }
    }
    return $groupIdParent;
  }
}
if (!function_exists('get_posts')) {
  function get_posts($start = 1, $num_per_page = 1, $where = "")
  {
    if (!empty($where)) {
      $where = "WHERE {$where} ";
    }
    $list_posts = Post::offset($start)->limit($num_per_page)->get();
    return $list_posts;
  }
}
if (!function_exists('get_products')) {
  function get_products($start = 1, $num_per_page = 1, $where = "")
  {
    $list_products = Product::whereIn('id', $where)->orderBy('price', 'ASC')->offset($start)->limit($num_per_page)->get();
    return $list_products;
  }
}
if (!function_exists('getListProductForShow')) {
  function getListProductForShow($start = 1, $num_per_page = 1, $whereIn = "", $orderBy = "", $whereBetween = "")
  {
    if (!empty($whereBetween)) {
      $list_products = Product::whereIn('id', $whereIn)->where(['status' => 'active'])->whereBetween('price', $whereBetween)->orderBy('price', $orderBy)->offset($start)->limit($num_per_page)->get();
    } else {
      $list_products = Product::whereIn('id', $whereIn)->where(['status' => 'active'])->orderBy('price', $orderBy)->offset($start)->limit($num_per_page)->get();
    }
    return $list_products;
  }
}
if (!function_exists('get_pagging')) {
  function get_pagging($num_page, $page, $base_url = "")
  {
    $str_pagging = "<ul class='pagging' id='pagging_posts' data_uri = '" .  route('pagging_posts')  . "'>";
    if ($page == 1) {
      for ($i = 1; $i <= $page + 1; $i++) {
        $active = "";
        if ($i == $page) {
          $active = "class = 'active'";
        }
        $str_pagging .= "<li {$active}><a href=\"{$base_url}?page={$i}\" page-id = \"{$i}\" >$i</a></li>";
      }
      $str_pagging .= "<li><a href=\"{$base_url}?page=4\" page-id = \"4\" >...</a></li>";
      $str_pagging .= "<li><a href=\"{$base_url}?page={$num_page}\" page-id = \"{$num_page}\" >$num_page</a></li>";
    }
    if ($page > 1 && $page <= ($num_page - 1)) {
      $page_prev = $page - 1;
      $str_pagging .= "<li><a href=\"{$base_url}?page={$page_prev}\" page-id = \"{$page_prev}\"><i class='fas fa-chevron-left'></i></a></li>";
      $i = $page - 1;
      for ($i; $i <= $page + 1; $i++) {
        $active = "";
        if ($i == $page) {
          $active = "class = 'active'";
        }
        $str_pagging .= "<li {$active}><a href=\"{$base_url}?page={$i}\" page-id = \"{$i}\" >$i</a></li>";
      }
      $page_next = $page + 1;
      $str_pagging .= "<li><a href=\"{$base_url}?page={$page_next}\" page-id = \"{$page_next}\"><i class='fas fa-chevron-right'></i></a></li>";
    }
    if ($page == $num_page) {
      $page_prev = $page - 1;
      $str_pagging .= "<li><a href=\"{$base_url}?page={$page_prev}\" page-id = \"{$page_prev}\"><i class='fas fa-chevron-left'></i></a></li>";
      $str_pagging .= "<li><a href=\"{$base_url}?page=1\" page-id = '1'>1</a></li>";
      $str_pagging .= "<li><a href=\"{$base_url}?page=1\" page-id = \"1\" >...</a></li>";
      $str_pagging .= "<li class='active'><a href=\"{$base_url}?page={$num_page}\" page-id = \"{$num_page}\" >$num_page</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
  }
}
if (!function_exists('pagging_products')) {
  function pagging_products($num_page, $page, $base_url = "")
  {
    $str_pagging = "<nav>
    <ul class ='pagination'>";
    if ($page > 1) {
      $page_prev = $page - 1;
      $str_pagging .= " <li class ='page-item' >
      <a class ='page-link' href=\"{$base_url}?page={$page_prev}\" rel='prev' aria-label='« Previous'><i class='fas fa-chevron-left'></i></a>
      </li>";
    } else {
      $str_pagging .= " <li class ='page-item disabled' aria-disabled='true' aria-label='« Previous'>
      <span class ='page-link' aria-hidden='true'><i class='fas fa-chevron-left'></i></span>
      </li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
      $active = "";
      if ($i == $page) {
        $active = "active";
      }
      $str_pagging .= "<li class ='page-item {$active}'>
          <a class ='page-link' href=\"{$base_url}?page={$i}\">$i</a>
          </li>";
    }
    if ($page < $num_page) {
      $page_next = $page + 1;
      $str_pagging .= " <li class ='page-item' >
      <a class ='page-link' href=\"{$base_url}?page={$page_next}\" rel='next' aria-label='Next »'><i class='fas fa-chevron-right'></i></a>
      </li>";
    } else {
      $str_pagging .= " <li class ='page-item disabled' aria-disabled='true' aria-label='Next »'>
      <span class ='page-link' aria-hidden='true'><i class='fas fa-chevron-right'></i></span>
      </li>";
    }
    // <li class ='page-item'>
    // <a class ='page-link' href=\"{$base_url}?page={$page}\" rel='next' aria-label='Next »'>›</a>
    // </li>
    $str_pagging .= "</ul>
    </nav>";
    return $str_pagging;
  }
}
