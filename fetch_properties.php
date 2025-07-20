<?php
$properties = [
  [
    'title' => 'Gulberg House',
    'owner' => 'Mr Azlan Khan',
    'description' => 'Based on a one acre house with...',
    'status' => 'Available for sale',
    'image' => 'property1.jpg'
  ],
  [
    'title' => 'Zarsan House',
    'owner' => 'Mr Sami',
    'description' => 'Luxurious double storey home...',
    'status' => 'Available for sale',
    'image' => 'property2.jpg'
  ],
  [
    'title' => 'White Villa',
    'owner' => 'Mrs Ayesha',
    'description' => 'Beautiful white-themed interior...',
    'status' => 'Available',
    'image' => 'property3.jpg'
  ],
  [
    'title' => 'Khan Mansion',
    'owner' => 'Mr Bilal Khan',
    'description' => 'A classic mansion with garden...',
    'status' => 'Available for sale',
    'image' => 'property4.jpg'
  ]
];

foreach ($properties as $property) {
  echo '<div class="card">';
  echo '<img src="' . $property['image'] . '" alt="' . $property['title'] . '">';
  echo '<h3>' . $property['title'] . '</h3>';
  echo '<p><strong>Owner:</strong> ' . $property['owner'] . '</p>';
  echo '<p>' . $property['description'] . '</p>';
  echo '<p><strong>' . $property['status'] . '</strong></p>';
  echo '</div>';
}
?>
