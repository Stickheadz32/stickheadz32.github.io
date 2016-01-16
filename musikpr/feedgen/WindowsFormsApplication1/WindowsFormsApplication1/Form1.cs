using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {   /*NOW*/
            DateTime a = DateTime.Now;
            string[] m = { "jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "okt","nov","dec"};
            string b = a.Year+"/"+m[a.Month-1]+"/"+a.Day.ToString();
            textBox3.Text = b;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            resultURL.Text = "";
            if (inputURL.Text != "")
                if (inputURL.Text.Contains("http://")) resultURL.Text = inputURL.Text;
                else
            if (!inputURL.Text.Contains("http://") && !inputURL.Text.Contains("https://"))
                resultURL.Text = "http://"+inputURL.Text;
            if(inputURL.TextLength>7&&inputURL.Text[inputURL.TextLength-1]!='/')
                resultURL.Text+="/";
            if (textBox3.Text != "") resultURL.Text += textBox3.Text;
            if (resultURL.Text!=""&&resultURL.Text[resultURL.TextLength - 1] != '/') resultURL.Text += "/";
            if (textBox4.Text != "") resultURL.Text += textBox4.Text;
            feedResult.Text="<!DOCTYPE html>\r\n";
            feedResult.AppendText("<html>\r\n");
            feedResult.AppendText("  <head>\r\n");
            feedResult.AppendText("    <title>" + textBox1.Text == "" ? "-Untitled-" : textBox1.Text);
            feedResult.Text+=inputSplit.Text[0]==' '?"":" ";
            feedResult.AppendText("    <meta name=\"author\" content=\"" + textBox5.Text + "\"/>\r\n");
            feedResult.AppendText("    <meta name=\"keywords\" content=\"" + textBox2.Text + "\"/>\r\n");
            feedResult.AppendText("    <meta name=\"generator\" content=\"Stickheadz32's FeedGen v0.1\"/>\r\n");
            feedResult.AppendText("  </head>\r\n\r\n");
            feedResult.AppendText("  <body>\r\n");
            feedResult.AppendText("    "+textBox6.Text+"\r\n");
            feedResult.AppendText("  </body>\r\n");
            feedResult.AppendText("</html>");
        }
    }
}
