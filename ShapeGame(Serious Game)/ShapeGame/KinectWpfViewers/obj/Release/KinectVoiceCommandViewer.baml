   M S B A M L   `   `   `  ???? ^  ZMicrosoft.Samples.Kinect.WpfViewers, Version=0.0.0.0, Culture=neutral, PublicKeyToken=nullY1clr-namespace:Microsoft.Samples.Kinect.WpfViewers#Microsoft.Samples.Kinect.WpfViewers  B    <Microsoft.Samples.Kinect.WpfViewers.KinectVoiceCommandViewer   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     @d2http://schemas.microsoft.com/expression/blend/2008     @kv1clr-namespace:Microsoft.Samples.Kinect.WpfViewers     .??? $??30??$	??300??
???   ?  ? ColumnDefinitions  ?? $
??140* ??? $
??500* ??? $
??160* ?.+??? -   $??textBlockModeFeedback??$??0??$
??Left=?$??14(?
???????$??Say Kinect to activate...??$	??6,4q?$	??Top=??? -   $??textBlockCommandFeedback??$??1??$
??Left=?$??14(?
???????$?? ??$	??6,4q?$	??Top=??? -   $??textBlockActionFeedback??$??2??$
??Left=?$??14(?
???????$?? ??$	??6,4q?$	??Top=??   9Microsoft.Samples.Kinect.WpfViewers.KinectSpeechCommander  -     Name$ kinectSpeechCommander??   ActiveListeningTimeout$ 5??!   DefaultConfidenceThreshold$
 0.50??!   DefaultListeningGrammarUri$k epack://application:,,,/Microsoft.Samples.Kinect.WpfViewers;component/SpeechGrammars/SpeechGrammar.xml??"   DefaultListeningGrammarRule$ defaultListen??    ActiveListeningGrammarUri$k epack://application:,,,/Microsoft.Samples.Kinect.WpfViewers;component/SpeechGrammars/SpeechGrammar.xml??!   ActiveListeningGrammarRule$ activeListen??