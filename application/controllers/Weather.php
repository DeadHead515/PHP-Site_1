<?php


class Weather extends CI_Controller
{
    public function index()
    {

        $this->load->view('/weather/weather_view');

    }

    public function get_weather()
    {
       
        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('state', 'State', 'trim|required|min_length[2]');
       
        if($this->form_validation->run()== FALSE)
        {
            $data = array(
                'errors' => validation_errors()
            );

            $this->session->set_flashdata($data); 
            //this set_flashdata will set and unset our session.  find more https://codeigniter.com/user_guide/libraries/sessions.html?highlight=set%20flashdata#flashdata          
            
            $this->load->view('weather/weather_view', $data);
            // could this be why my flash data shows up on the log in form section of the home_view? 

        } 
        else 
        {
            $data = array(
                'city'  => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'key'   => 'e496f50ca8f95e253fdda72574220bd2'
            );

            //echo var_dump($data);
            // echo '<br>';
            // echo '<br>';
            // example call 
            // api.openweathermap.org/data/2.5/weather?q={city name},{state}&appid={your api key}
            $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$data['city'].','.$data['state'].'&units=imperial'.'&appid='.$data['key'];
            
            //echo var_dump($url);

            if(isset($data))
            {
               $response = file_get_contents($url);
            //    echo $response,'<br>','<br>';
               
                $arr =  json_decode($response, true);
            
                // var_dump($arr);
            //     echo "<hr>";
               $data['name'] = $arr["name"];
               $data['temp'] = $arr["main"]["temp"];
               $data['wind'] = $arr["wind"]["speed"];

                $this->load->view('weather/weather_display',$data);


            }
            else
            {
               log_message('error', 'Your data variable is not set.'); 
            }


        }   

    }







}

?>