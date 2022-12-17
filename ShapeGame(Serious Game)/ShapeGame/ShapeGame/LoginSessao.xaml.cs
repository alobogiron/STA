using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using MySql.Data.MySqlClient;
using MySql.Data;

namespace ShapeGame
{
    /// <summary>
    /// Lógica interna para LoginSessao.xaml
    /// </summary>
    public partial class LoginSessao : Window
    {
        MySqlConnection connection = new MySqlConnection("server=127.0.0.1;user id=root;database=STA;allowuservariables=True;password=2020;");
        MySqlCommand cmd;
        MySqlDataReader mdr;
        public LoginSessao()
        {
            InitializeComponent();
        }

        //classe da Sessao que armazena o código da sessão

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            try
            {
                connection.Open();
                Console.WriteLine("Criei a conexão");
                string queryStr = "select * from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where codSessao = '" + codSessao.Text + "';";
                cmd = new MySqlCommand(queryStr, connection);

                mdr = cmd.ExecuteReader();
                mdr.Read();
                if (mdr.HasRows)
                {
                    if (mdr.GetString("statusSessao") == "Aguardando")
                    {
                        Console.WriteLine("Encontrei a sessão");
                        string codSessao = mdr.GetString("codSessao");
                        mdr.Close();
                        connection.Close();

                        //armazeno o código da sessão
                        //var token = new Sessao(codSessao.Text);

                        connection.Open();
                        queryStr = "Update sessao set statusSessao = 'Indisponível' where sessao.codSessao = '" + codSessao + "';";
                        cmd = new MySqlCommand(queryStr, connection);
                        mdr = cmd.ExecuteReader();
                        mdr.Read();
                        Console.WriteLine("Atualizei o status");

                        this.Hide();
                        MainWindow jogo = new MainWindow();
                        jogo.labelUser.Text = codSessao;
                        jogo.Show();
                    }
                    else if (mdr.GetString("statusSessao") != "Aguardando")
                    {
                        MessageBox.Show("A sessão que você está tentando iniciar não está preparada, o status da sessão atual é '" + mdr.GetString("statusSessao")+"', volte a página principal e clique em 'Iniciar sessão'", "Status inesperado", MessageBoxButton.OK, MessageBoxImage.Error);
                    }
                    //else if (mdr.GetString("statusPaciente") != "Aguardando")
                    //{
                        //MessageBox.Show("O paciente não está preparado para iniciar a sessão, volte a página inicial e clique em 'Iniciar sessão'", "Status inesperado", MessageBoxButton.OK, MessageBoxImage.Error);
                    //}
                }
                else
                {
                    MessageBox.Show("O código não coincide com nenhuma sessão registrada", "Sessão inexistente", MessageBoxButton.OK, MessageBoxImage.Error);
                }
                mdr.Close();
                connection.Close();
                Console.WriteLine("Tô indo embora");
            }
            catch (Exception ex)
            {
                MessageBox.Show("Houve um problema ao estabelecer a conexão com nosso banco de dados: "+ ex.Message, "Exception Sample", MessageBoxButton.OK, MessageBoxImage.Warning);
            }
        }
    }
}
