   M S B A M L   `   `   `  ???? ^  ZMicrosoft.Samples.Kinect.WpfViewers, Version=0.0.0.0, Culture=neutral, PublicKeyToken=null?^clr-namespace:Microsoft.Samples.Kinect.WpfViewers;assembly=Microsoft.Samples.Kinect.WpfViewers#Microsoft.Samples.Kinect.WpfViewers  S OMicrosoft.Kinect.Toolkit, Version=1.8.0.0, Culture=neutral, PublicKeyToken=nulleHclr-namespace:Microsoft.Kinect.Toolkit;assembly=Microsoft.Kinect.ToolkitMicrosoft.Kinect.Toolkit  	ShapeGame   ShapeGame.MainWindow   R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    kkt^clr-namespace:Microsoft.Samples.Kinect.WpfViewers;assembly=Microsoft.Samples.Kinect.WpfViewers    R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     \toolkitHclr-namespace:Microsoft.Kinect.Toolkit;assembly=Microsoft.Kinect.Toolkit     @d2http://schemas.microsoft.com/expression/blend/2008     Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     -     ? Title$  Kinect Shape Game??$??Italic$? ? SizeToContent$ WidthAndHeight=?$??1012.376?? ? 
ResizeMode$ NoResize=?.???  ? ColumnDefinitions ?? $
??619* ??? $
??319* ?.+???  ?? Orientation$ Vertical=????	#FF383838$??2?? K? ZIndex$ -2??.+?? .+??? -    ??Name$ 	playfield??$??	0,0,387,0q?$	??688??$	??619??$ 3??????  ?? EndPoint$ 0.5,1&? ?? 
StartPoint$ 0.5,0&?.??? 	 ? Color$	 	#D9040833??
 ? Offset$
 0.238Q?? $	 	#FF46BC44??$
 1Q?? $	 	#E61747B2??$
 0.811Q?.+??? -    ??Name$ 	labelUser?? ?? Left$ 10??$
??Wrap=?
 ?? Top$ 10??
???????;   5Microsoft.Samples.Kinect.WpfViewers.KinectColorViewer  $??	0,18,19,0q?$	??160??$	??120??$	??Top=?$ 3??7   1Microsoft.Samples.Kinect.WpfViewers.KinectControl   KinectSensorManager ?? 4  .Microsoft.Kinect.Toolkit.KinectSensorChooserUI  -     Name$ SensorChooserUI??   IsListening . $
??Left=?$	??Top=?$??	299px 0pxq?$ 3???? -    ??Name$ 	enableAec??
???????$??20(?$??	19,0,0,18q?$
??Left=?$??Bottom=?$y?	Collapsed=?{?.  $2??,Enable Echo Cancellation on Default Speakers???? -    ??Name$ btnInit??$??Prepara Tentativa??$??	0,0,386,0q??? -   $ btnClose??{?.  $??Finaliza Tentativa??$??	0,0,386,0q?&   System.Windows.Controls.DataGrid  -     Name$ dtGrid??
???????$
??Left=?$	??752??$??	618,0,0,0q?$	??Top=?$	??387?????	#FF383838$ -1??$??2??$??Normal$?$??Poppins SemiBold)?$??16(????	#DDFFFFFF????  ? 	Resources =  7System.Windows.Controls.Primitives.DataGridColumnHeader ?? BasedOn ?? 
TargetType ?? Property ?? Value ?? Triggers P? Property P? Value??%?   '        7 ?? 8   "  .???  ? ?? ?#6540a2??  ? ??
 ????? P?  ?@J?IsMouseOver . . ???  ? ?? ?#e2b0ff