   M S B A M L   `   `   `  ????^  ZMicrosoft.Samples.Kinect.WpfViewers, Version=0.0.0.0, Culture=neutral, PublicKeyToken=null?^clr-namespace:Microsoft.Samples.Kinect.WpfViewers;assembly=Microsoft.Samples.Kinect.WpfViewers#Microsoft.Samples.Kinect.WpfViewers  5   	   S OMicrosoft.Kinect.Toolkit, Version=1.8.0.0, Culture=neutral, PublicKeyToken=nulleHclr-namespace:Microsoft.Kinect.Toolkit;assembly=Microsoft.Kinect.ToolkitMicrosoft.Kinect.Toolkit 5   	    	ShapeGame   ShapeGame.MainWindow   5   	   R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    kkt^clr-namespace:Microsoft.Samples.Kinect.WpfViewers;assembly=Microsoft.Samples.Kinect.WpfViewers    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   \toolkitHclr-namespace:Microsoft.Kinect.Toolkit;assembly=Microsoft.Kinect.Toolkit     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     6F   -   5          ? Title$  Kinect Shape Game??5   	   $??Italic$?6#    ? SizeToContent$ WidthAndHeight=?66   $??1012.376??5   M    ? 
ResizeMode$ NoResize=?6^   .??5	      ?  ? ColumnDefinitions 5
   
   ?? 5      $
??619* ?6   ?? 5      $
??319* ?6   .+?5   
   ??  ?? Orientation$ Vertical=?6   ???	#FF383838$??2??6C    K? ZIndex$ -2??6W   .+?5      ? .+?5      ?? -   5         ??Name$ 	playfield??5   ,   $??	0,0,387,0q?6   $	??688??6?   $	??619??6L   $ 3??6{   ??5      ?? 5       ?? EndPoint$ 0.5,1&?6.    ?? 
StartPoint$ 0.5,0&?6?   .??5      ? 	 ? Color$	 	#D9040833??6+   
 ? Offset$
 0.238Q?6=   ? 5      $	 	#FF46BC44??6+   $
 1Q?6=   ? 5      $	 	#E61747B2??6+   $
 0.811Q?6=   5      .+?5      ?? -   5         ??Name$ 	labelUser??5        ?? Left$ 10??63   $
??Wrap=?6D   
 ?? Top$ 10??6X   
???????6h   5      ;   5Microsoft.Samples.Kinect.WpfViewers.KinectColorViewer  5      $??	0,18,19,0q?6'   $	??160??6;   $	??120??6G   $	??Top=?6T   $ 3??6?   7   1Microsoft.Samples.Kinect.WpfViewers.KinectControl   KinectSensorManager 6l   ?? 6?   4  .Microsoft.Kinect.Toolkit.KinectSensorChooserUI  5      -   5          Name$ SensorChooserUI??5   0      IsListening . $
??Left=?6]   $	??Top=?6x   $??	299px 0pxq?6?   $ 3??6?   5      ?? 5      -   5         ??Name$ 	enableAec??5      
???????$??20(?6=   $??	19,0,0,18q?6K   $
??Left=?6^   $??Bottom=?6y   $y?	Collapsed=?6?   {?.  $2??,Enable Echo Cancellation on Default Speakers??6?   ?? 5      -   5         ??Name$ btnInit??5      $??Prepara Tentativa??6;   $??	0,0,386,0q?6W   ?? 5      -   5        $ btnClose??5      {?.  $??Finaliza Tentativa??6O   $??	0,0,386,0q?6l   5       &   System.Windows.Controls.DataGrid  5!   
   -   5          Name$ dtGrid??5!      
???????$
??Left=?6S   $	??752??6n   $??	618,0,0,0q?6{   $	??Top=?6?   $	??387??6?   ???	#FF383838$ -1??6?   $??2??6?   $??Normal$?6?   $??Poppins SemiBold)?6  $??16(?6   ???	#DDFFFFFF??6#   ??  ? 	Resources 5"      =  7System.Windows.Controls.Primitives.DataGridColumnHeader ?? BasedOn ?? 
TargetType ?? Property ?? Value ?? Triggers P? Property P? Value??%?   '        7 ?? 5#      8   "  6Q   .?5$      ??  ? ?? ?#6540a263   ?? 5%       ? ??
 ?????63    5&      P? 5'       ?@J?IsMouseOver . . ?5(      ??  ? ?? ?#e2b0ff6;   5)      5+      5,      5-      5.      5/      