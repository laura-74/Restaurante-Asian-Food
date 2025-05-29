<?php
require_once "conexion.php";
$db = new Database();
class MenuNode {
    public $id;
    public $label;
    public $children;
    public function __construct($id, $label) {
        $this->id = $id;
        $this->label = $label;
        $this->children = [];
    }

    public function addChild(MenuNode $child) {
        $this->children[] = $child;
    }
}

$menuRoot = new MenuNode(0, "Menú");

$menus = $db->read("menu");
foreach ($menus as $menuRow) {
    $menuNode = new MenuNode($menuRow['id'], $menuRow['nombre']);

    // Solo platos de este menú
    $platos = $db->read("plato", ["menu_id" => $menuRow['id']]);
    foreach ($platos as $platoRow) {
        $platoNode = new MenuNode($platoRow['id'], $platoRow['nombre']);
        $menuNode->addChild($platoNode);
    }

    $menuRoot->addChild($menuNode);
}

function renderMenu($node) {
    $hasChildren = !empty($node->children);
    $html = "<ul>";
    $html .= "<li" . ($hasChildren ? " class='menu-category'" : "") . ">";
    $html .= "<span class='menu-label'>" . htmlspecialchars($node->label) . "</span>";
    if ($hasChildren) {
        $html .= "<ul class='submenu'>";
        foreach ($node->children as $child) {
            $html .= renderMenu($child);
        }
        $html .= "</ul>";
    }
    $html .= "</li>";
    $html .= "</ul>";
    return $html;
}
?>

