   M S B A M L   `   `   `  ????D  @ShapeGame, Version=0.0.0.0, Culture=neutral, PublicKeyToken=null%clr-namespace:ShapeGame	ShapeGame  5   	       ShapeGame.LoginSessao   5   	   R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   )localclr-namespace:ShapeGame     5   	   b ^MaterialDesignThemes.Wpf, Version=4.1.0.2556, Culture=neutral, PublicKeyToken=df2a72020bd7962aFmaterialDesign1http://materialdesigninxaml.net/winfx/xaml/themes  5
   	     ? Title$  Sessao Tracker??5   	   $	??450??6    $	??800??6-    ? WindowStartupLocation$ CenterScreen=?5	   	      MaterialDesignBody#???   5   	   $??Regular"?5   	   $??13(?5   	   &   System.Windows.Media.TextOptions   TextFormattingMode$ Ideal=?5   	      TextRenderingMode$
 Auto=?5   	     MaterialDesignFont#???  5   	    ? 
ResizeMode$ NoResize=?5   	    ? Icon$ logo.png??6   ??5      ?? 5   
    ?? EndPoint$ 0.5,1&?6    ?? 
StartPoint$ 0.5,0&?6/   .??5      ?  ? Color$ 	#FF7400FF??6   	 ? Offset$	 0.016Q?6-   ? 5      $ White??6   $	 1Q?6)   5      .??5      ?? .+?5   
   ?? $??logo.png??6   $	??120??6"   $??20q?6.   6<   ?? 5   
   $	??Top=?6   $??Center=?5      $??30(?5      $??20q?5      
 ? ToolTip$
 
Foda pakas??5       ? Cursor$ Arrow??5       Informe o código da sessão5!   1   ?? 5"   
   -   5         ??Name$ 	codSessao??5"      $??20(?6%   $??Center=?5#      $	??300??5$       ?? 	MaxLength$ 8??5%      5&      ? 5'   
   $??Center=?6   .+?5(      ?? -   5        $??Center=?5(      $??Center=?5)      $
 Hand??5*      $>
 8Clique aqui para realizar a conexão e iniciar a sessão??5+      $??20q?5,       # MaterialDesignRaisedLightButton#??[ 5-      .??5.      
Conectar6   ?? 50      $??Center=?6   $??Center=?51      $
 Help??52      $)
 #Caso esteja com dúvida aperte aqui??53      $??20q?54      $??30??55      $??30??56       + 'MaterialDesignFloatingActionLightButton#??[ 57      .??59      '  !MaterialDesignThemes.Wpf.PackIcon     Kind$
 Help=?6*   $??15??66   $??15??6B   5:      5;      5<      5=      